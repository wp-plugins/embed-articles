=== Embed Articles ===
Plugin Name: Embed Articles
Plugin URI: http://embedarticles.com
Tags: plugin, admin, image, widget, embed, embed article, embed articles, articles, google, comments, embed free articles, SEO, search engine optimization, article, shortcode, shortcodes, embed shortcodes, metadata, open graph, ogp, schema, oembed, iframe, widgets, widget, ezine articles, free ezine articles, full-text content, plugin, plugins, Post, posts, simple, wordpress
Author: EmbedArticles.COM
Contributors: gprialde
Version: 7.0.2
Author URI: http://embedarticles.com
Requires at least: 3.0
Tested up to: 4.1 
Donate link: https://pledgie.com/campaigns/26781

Embed any article or post from your blog to any other external blog or website. Add SEO to your blog with automated Open Graph Protocol meta creation.

== Description ==

Embed Articles is a viral content distribution plugin that enables your posts and articles to be embedable to other websites through a creative embed button interface. By installing this plugin into your blog, your blog will be automatically be added with proper Open Graph Protocol metadatas which are being respected and parsed by most search engines like Google, Bing, and Yahoo.

Another interesting and useful feature is the ability to display question and answer data brought to us by https://www.isnare.org

<a href=http://embedarticles.com id=embedarticles_button data-url=null data-key=null data-button-type=e>Embed Articles </a><script src=http://embedarticles.com/widget/button.js></script>

= Features =

1. Shortcode available '''[embed_articles url=]''' Example: [embed_articles url=http://www.bbc.co.uk/democracylive/scotland-29461347]
2. Visual and text editor button support '''&lt; &gt;''' to embed articles
3. Auto generates Open Graph Protocol Metadatas, so you won't bother coding those metadata html codes.
4. Auto syndicate your blog to embedarticles.com.
5. Share and embed full-text content from around the web to your blog, easily through a shortcode.
6. Adds visibility and gets your blog content discovered by other curation and discovery systems through the Open Graph API and Schema.org scopes.
7. Choices of button location as follows: A) top of post. B) bottom of post.
9. Display relevant question and answer data brought to us by https://www.isnare.org

= Support =

You can file <a href="https://wordpress.org/support/plugin/embed-articles" target="_new"><u>support tickets</u></a> and post reviews here at the plugin repository. 
Help us improve the plugin, a little contribution would greatly help! [<a href='https://pledgie.com/campaigns/26781' target='_new'>'''Support and Donate'''</a>]

== Your New Site or Blog Feature: Embed Articles? ==

This article will try to talk about ways of adding a new unique way site feature of embedding articles to other external blogs or websites. However, before we go through the whole process please take time to read some important information on the technicalities of this embedding procedure.

First we will tackle on if the Open Graph Protocol. What is OPG and what it does to your website or blog? To answer our question we are going to cite some few contents from https://blog.kissmetrics.com/open-graph-meta-tags/ which talks about "What You Need to Know About Open Graph Meta Tags for Total Facebook and Twitter Mastery".

According to this site, Open Graph Protocol was introduced by Facebook in 2010. And added. "It promotes integration between Facebook and other websites by allowing them to become rich "graph" objects with the same functionality as other Facebook objects. Put simply, a degree of control is possible over how information travels from a third-party website to Facebook when a page is shared (or liked, etc.). In order to make this possible, information is sent via Open Graph meta tags in the &lt;head&gt; part of the website's code."

So how does it matter if you are not concerned on Facebook's features or integrated widgets... Google and other large search companies across the web is already and actively supporting this content structured protocol and so to be short it adds more value to your site by providing a more structured content format for your site for ease of indexing and site formatting.

Open Graph Protocol Meta Tags

The OGP meta tags are sets of tags inside your HTML code &lt;head&gt; tag which is actually a summary and structured content of the entire page of your blog or website. To show what these tags look like, we have an example below.

&lt;meta property="og:title" content="The Rock" /><br>
&lt;meta property="og:type" content="article" /><br>
&lt;meta property="og:url" content="http://www.imdb.com/title/tt0117500/" /><br>
&lt;meta property="og:image" content="http://ia.media-imdb.com/images/rock.jpg" /><br>
&lt;meta property="og:site_name" content="IMDb" />

og:title - The title of your object as it should appear within the graph, e.g., "The Rock".

og:type - The type of your object, e.g., "article". Depending on the type you specify, other properties may also be required.

og:image - An image URL which should represent your object within the graph.

og:url - The canonical URL of your object that will be used as its permanent ID in the graph, e.g., "http://www.imdb.com/title/tt0117500/".

og:site_name - If your object is part of a larger web site, the name which should be displayed for the overall site. e.g., "IMDb".

Ok! so we have understood OGP, now that we are completely aware of what OGP is we will now talk about the ways on how actually embed articles to your blog or websites.

There are a few websites online that caters the need to embed text-content for publishers and among these few service websites is http://embedarticles.com

How EmbedArticles.com uses OGP to discover article content on a given url or page. With this data they create a simple yet informative embeddable content cards which displays all information about the content in a summarized snippet structure.

According to EmbedArticles, "We extracts and discovers a website through Open Graph [ogp.me] and/or Schemas [schema.org]. Whether from user-generated URL inputs or automated crawlers, EmbedArticles.com examines a given website URL and parse it for schemas and OGP metadata. Once a URL is discovered it will be added to the source list and ready for keyword indexing. Providers are site brands extracted from sources, which simply means Providers are site URL owners or hosts."

They have a current working WordPress plugin which can be downloaded here http://embedarticles.com/wordpress/ and they also have a how-to article section if you are using blogspot.com or blogger, please refer to this url http://embedarticles.com/how/#Blogger

I hope this article is helpful enough to have your site ready and serve your target feature of "Embedding Articles".

== Future Plans ==
1. Add new button option. Blog owners will have the ability to create and display their own custom buttons. [DONE]
2. Add option to include of social sharing buttons like facebook, twitter and others. [DONE]
3. Improve and add more button choices.

== Installation ==

1. Upload `embed-articles.zip` to the `/wp-content/plugins/` directory
2. Unzip `embed-articles.zip`
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Visit Embed Articles Menu Page -> For the Embed Articles settings and reports

== Frequently Asked Questions ==

= Do I need an account on embedarticles.com? =
Yes, you need a API Key from embedarticles.com. Use this link:
<a href="http://embedarticles.com/register/">http://embedarticles.com/register/</a>

= What do I need to do to embed an article? =
Please use the visual and rich text editor buttons: '''&lt; &gt;''' and [embed_articles]. You can highlight a URL or click the button right on load.

= My button stays at 0 is this OK? =
Yes, that is normal because embeds are counted when an actual embed has actually happened and not on how many clicks the button can recieve.

== Screenshots ==

1. Plugin settings...
2. Embed reports...
3. Embedded or embeddable cards...
4. Embed Button...

== Changelog ==
= 7.0.2 =
* Minor Fixes
= 7.0.1 =
* Minor Fixes
= 7.0.0 =
* Major Change
= 6.0.28 =
* Minor Fixes
= 6.0.27 =
* Added iSnare.org Answers option...
= 6.0.26 =
* Minor Modification
= 6.0.24 - 6.0.25 =
* Improved social sharing buttons
= 6.0.23 =
* Added dashboard widget
= 6.0.22 =
* Added Recommended Articles From EmbedArticles.com Instead of ZergNet
= 6.0.21 =
* Added sub-menu pages
* Display improvements for settings, discover, and reports pages
= 6.0.20 =
* Minor Modifications
= 6.0.19 =
* Added new button, "Button E-Compact"
= 6.0.18 =
* Minor Fixes
= 6.0.17 =
* Minor Fixes
= 6.0.15 - 6.0.16 =
* Transfered button files to sourceforge.net host
= 6.0.13 - 6.0.14 =
* Minor Fixes
= 6.0.12 =
* Added recommended articles option
= 6.0.11 =
* Removed custom button type
= 6.0.9 - 6.0.10 =
* Minor Fixes
= 6.0.8 =
* Added embed tooltip on content highlight
= 6.0.7 =
* Minor Fixes
= 6.0.3 - 6.0.6 =
* Minor Fixes
= 6.0.2 =
* Minor Fixes
= 6.0.1 =
* Minor Fixes
= 6.0.0 =
* Minor Fixes
* Added Google +1 button to social buttons
= 5.0.10 =
* Minor Fixes
= 5.0.9 =
* Updated bubble top button
= 5.0.8 =
* Minor Fixes
= 5.0.7 = 
* Minor Fixes
= 5.0.6 = 
* Minor Fixes
= 5.0.4 - 5.0.5 = 
* Minor Fixes
= 5.0.3 = 
* Added option to include social sharing buttons
= 5.0.2 = 
* Minor Fixes
= 5.0.1 = 
* Minor Fixes
= 5.0.0 = 
* Added an add custom button option for blog owner's button customization options
= 4.0.16 =
* Added new button, "The Square"
= 4.0.4 - 4.0.15 =
* Minor Fixes
= 4.0.1 - 4.0.4 =
* Minor Fixes
= 4.0.0 = 
* Added another button type
= 3.10.4 - 3.10.9 =
* Minor Fixes
= 3.10.3 =
* Added boostrap ui css
= 3.10.2 =
* Improved presentation display of plugin menu page and archive's table...
= 3.4 =
* Added archives search and better content display...
= 3.5 - 3.9 =
* Minor Fixes
= 3.4 =
* Added "The Community" and temporarily removed reports...
= 3.1 - 3.3 =
* Minor Fixes
= 3.0 =
* Added reports...
= 2.6 - 2.13 =
* Minor Fixes
= 2.5 =
* Used menu_page instead of options_page
= 2.3 - 2.4 =
* Minor Fixes
= 2.2 =
* Minor Fixes
= 2.1 =
* Added Embed Articles button to visual text editor
= 2.0 =
* Added Quicktag for [embed_articles url=] shortcode to text editor...
= 1.8 - 1.10 =
* Minor Fixes
= 1.7 =
* Minor Fixes
= 1.6 =
* Added button location options
= 1.5 =
* Minor Fixes
= 1.4 =
* Added support for Facebook_Open_Graph_Protocol class so no need of technical skills to add those metadatas to comply with our Open Graph requirements.
= 1.3 =
* Minor Fixes
= 1.2 =
* Added shortcode, e.g; [embed_articles url=http://www.bbc.co.uk/democracylive/scotland-29461347]
= 1.1 =
* Minor Fixes
= 1.0 =
* First Release