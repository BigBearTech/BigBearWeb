<?php

namespace App\Classes;

use TNTSearch;

use App\Post;
use App\Testimonial;

/**
* 
*/
class Search
{
	
	function __construct()
	{
		# code...
	}

	public function index()
	{
		// Index the posts
		$indexerPosts = TNTSearch::createIndex('bigbearweb.posts');
		$indexerPosts->query("SELECT id, name, content FROM posts WHERE post_type = 'post' AND deleted_at IS NULL");
		$indexerPosts->run();

		// Index the pages
		$indexerPages = TNTSearch::createIndex('bigbearweb.pages');
		$indexerPages->query("SELECT id, name, content FROM posts WHERE post_type = 'page' AND deleted_at IS NULL");
		$indexerPages->run();

		// Index the testimonials
		$indexerTestimonials = TNTSearch::createIndex('bigbearweb.testimonials');
		$indexerTestimonials->query("SELECT id, fullname FROM testimonials WHERE deleted_at IS NULL");
		$indexerTestimonials->run();
	}

	public function search($value='', $index)
	{
		TNTSearch::selectIndex("bigbearweb.$index");
		$res = TNTSearch::searchBoolean($value, 10);

		if($index === 'posts') {
			$results = Post::where('post_type', 'post')->whereIn('id', $res['ids'])->get();
		} else if($index === 'pages') {
			$results = Post::where('post_type', 'page')->whereIn('id', $res['ids'])->get();
		} else if($index === 'testimonials') {
			$results = Testimonial::whereIn('id', $res['ids'])->get();
		}

		return $results;
	}
}