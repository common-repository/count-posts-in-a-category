=== Count Posts in a Category, Tag, or Custom Taxonomy ===
Plugin URI: http://shinraholdings.com/plugins/count-posts-in-a-category
Contributors: bitacre
Donate link: http://shinraholdings.com/donate
Tags: plugin, template, tag, count, posts, category, counter, taxonomy, custom taxonomy, tags, number, shortcode
Requires at least: 2.8
Tested up to: 3.5
Stable tag: 3.1

Adds a custom shortcode that returns the number of posts in a category, tag, or custom taxonomy. Accepts a slug (default), ID, or name as input and works on all terms.

== Description ==
This plugin allows you to dynamically return the number of posts in a particular category, tag, or custom taxonomy. Inserting `[cat_count value="category-slug"]` in a post or page, or `<?php do_shortcode('cat_count slug="category-slug" '); ?>` anywhere in WordPress' code will return the number of posts in that particular category.

Useful for creating dynamic table of contents pages, keeping track of post stats, general bragging, or any place where keeping a running tally might be desirable. 

== Installation ==
1. Download the latest zip file and extract the `post-count-per-category` directory.
2. Upload this directory inside your `/wp-content/plugins/` directory.
3. Activate 'Post Count per Category' on the 'Plugins' menu in WordPress.
4. Insert in a post or page: `[cat_count slug="category-slug"]` to count a category, `[tag_count slug="tag-slug"]` to count a tag, or [tax_count tax="taxonomy-name" slug="taxonomy-slug"] to count a custom taxonomy. (Replacing the slugs in quotes with an acutal slug name) to return the number of posts in that category, tag or custom taxonomy.

== Frequently Asked Questions ==
= How do I add it into my posts? =
You must insert the shortcode in location where you want to count to appear: (always replacing category-slug with an acutal slug name)

For categories:
* `[cat_count slug="category-slug"]`

or for a tag:
* `[tag_count slug="tag-slug"]`


or for a custom taxonomy:
* `[tax_count tax="taxonomy-name" slug="taxonomy-slug"]`

The legacy shortcode assumes you are giving it slugs, but it can also accept category names or IDs:

* `[ccp type="name" cat="Category Name"]`
* `[ccp type="id" cat="27"]`

or for a tag:
* `[ccp type="name" tag="Tag Name"]`
* `[ccp type="id" tag="28"]`

With the new shortcodes, you can specify slug="", id="", or name="" directly. If more than one is given, posts are selected in that order.

= Can I add the count multiple terms? =
* As of version 3.1... Yes! You can specify more than 1 `ID` or `slug` by separating the values with commas. You have to use either `ID` or `slug`, not a combination of both. Also, you cannot use the `name` attribute (since a name may ostensibly contain commas naturally, unlike a slug or ID). 

* So, for example, if you had 3 categories with the slugs "cat-1", "cat-2", and "cat-3" each with 10 posts, you could get the count for all three (it would return "30") using this shortcode:

`[cat_count slug="cat-1,cat-2,cat-3"]`

* Thanks to [Jack Brand](http://shinraholdings.com/plugins/count-posts-in-a-category/#comment-368) for this excellent suggestion.

= It keeps returning 0 posts, why? =
Make sure you're using the correct slug, sometimes they are different from the actual category name and capitalization matters. You can view them by clicking on the Categories link under Posts. 

Also don't literally copy "category-slug," you need to put the category you want counted there, that's just a place holder. So to count the number of posts in a category called 'Book Reviews' with a slug name of 'book-reviews' you would insert `[cat_count slug="book-reviews"]`. 

= Why are there 2 kinds of shortcodes =
The shortcodes without underscores are legacy shortcodes, I left them in the plugin so stuff won't break, but you should use the new shortcodes if possible. The legacy shortcodes include:
[ccp]
[catcountposts]
[countposts]
[countpost]
[postsincat]
[postincat]

The legacy shortcodes only work for categories and tags, and they all follow the format `[ccp type="slug/id/name" cat="category-slug/id/name" tag="tag-slug/id/name"]`

The NEW shortcodes all have underscores, and follow a slightly different format. There are 3 seperate shortcodes:
For **Categories**:
* `[cat_count slug="cat-slug"]` or `[cat_count id="45"]` or `[cat_count name="Category Name"]`

For **Tags**:
* `[tag_count {slug="tag-slug"} {id="45"} {name="tag name"} ]`

For **Custom Taxonomies**:
* `[tax_count tax="custom-tax-type" {slug="tax-slug"} {id="99"} {name="Taxonomy Item Name"} ]`

You only need to specify 1 of the following: `slug=""`, `id=""`, or `name=""`. If you specify more than one, the plugin will ignore the other attributes in the order of slug > id > name.

You also need to specify the `tax="custom-tax-type"` for the `[tax_count]` shortcode. This is so the plugin knows which custom taxonomy to count.

= Can you add this feature I just thought of? =
Can I? Yes. Will I? Yes, if I think it would be a helpful addition. I'm trying to keep things clean and simple, but there's always room for improvement, so let me know if you think a feature is lacking!

== Screenshots ==

1. Some examples of what you can do with the plugin (in the body of a post).
2. The code that created the output in the picture above.

== Changelog ==
= 3.1 =
* Will now add counts of comma separated IDs or slugs together.
* Changed the name again.

= 3.0 =
* Will now count categories, tag, and custom taxonomies.
* Added additional (easier) shortcodes.

= 2.1 = 
* Will do tags as well as categories now.

= 2.0 =
* Added support for category name & ID input.
* Cleaned & commented up code considerably.

= 1.0 =
* First released version. 
* There may still be bugs, but I can't find any. 

== Upgrade Notice ==
= 3.1 =
Optional upgrade, adds the ability to get the sum of multiple terms by specifying their IDs or slugs separated by commas.

= 3.0 =
Recommended upgrade. Adds support for custom taxonomies as well as additional, easier shortcodes.

= 2.1 =
Recommended upgrade. Adds support for tags as well as categories.

= 2.0 =
Not a critical update. Adds more shortcodes and input methods and faster code.

= 1.0 =
First release, no upgrade notice (included to make the WordPress readme.txt validator happy).

== Readme Generator ==
* This plugin's readme.txt file was generated by the [bitacre Readme Generator](http://shinraholdings.com/project/readme-gen) for WordPress Plugins.

== Support ==
* [Plugin Homepage](http://shinraholdings.com/plugins/count-posts-in-a-category)
* [plugins@shinraholdings.com](mailto:plugins@shinraholdings.com)

== Donations ==
[Donations](http://shinraholdings.com/donate) are graciously accepted to support the continued development and maintenance of this and other plugins. We currently accept Paypal and kind words.
