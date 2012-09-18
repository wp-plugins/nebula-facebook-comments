=== Nebula Facebook Comments ===
Contributors: andromeda_media
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: Facebook, comment, comments, social, social media
Requires at least: 3.3
Tested up to: 3.4.2
Stable tag: 1.6

Replaces the default comments functionality by Facebook's Comments social plugin.

== Description ==

Replaces the default comments functionality by Facebook's Comments social plugin.

Comments Box is a social plugin that enables user commenting on your site. Features include moderation tools and distribution.

= Social Relevance = 

Comments Box uses social signals to surface the highest quality comments for each user. Comments are ordered to show users the most relevant comments from friends, friends of friends, and the most liked or active discussion threads, while comments marked as spam are hidden from view.

= Distribution =

Comments are easily shared with friends or with people who like your Page on Facebook. If a user leaves the “Post to Facebook” box checked when she posts a comment, a story appears on her friends’ News Feed indicating that she’s made a comment on your website, which will also link back to your site.

Friends and people who like the Page can then respond to the discussion by liking or replying to the comment directly in the News Feed on Facebook or in the Comments Box on your site. Threads stay synced across Facebook and on the Comments Box on your site regardless of where the comment was made.

The mobile version will automatically show up when a mobile device user agent is detected. You can turn this behavior off by setting the mobile parameter to false. Please note: the mobile version ignores the width parameter, and instead has a fluid width of 100% in order to resize well in portrait/landscape switching situations. You may need to adjust your CSS for your mobile site to take advantage of this behavior. If preferred, you can still control the width via a container element.

= Languages available =

* English by [andromeda_media](http://profiles.wordpress.org/andromeda_media "Visite the profile").
* German by [andromeda_media](http://profiles.wordpress.org/andromeda_media "Visite the profile").

You are welcome to translate this pugin into every language you want to. Just give me an Email with your *.po or *.mo file on info@andromeda-media.de.

== Installation ==

1. Upload the 'nebula-facebook-comments' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Get very social with your social media comments :-).

You can define the width of the plugin by the provided options panel. Although you can define how many comments it shows.

== Frequently Asked Questions ==

= Can I change the colors of this plugin? =

No. The colors are provided by Facebook. There is no way to change it. The only thing you can choose is a pre-defined color profile. For that there will be an option in one of this plugins future releases.

= Can I define my own width and height for the comment panel? =

Yes you can. There is an option for the width. Pleas fill in only the equivalent pixel value. E.g. for 250px please fill in 250. This plugin (and the social plugin provided by Facebook) doesn't support values like percent (100%) or em (3em).

= Does the plugin use the language of the country i am from? =

Good question. Yes and no. The plugin uses the language value defined in the wp-config.php where it says e.g. define( 'WPLANG', 'en_US' );. So the facebook social plugin will be automatically translatet into english. To finally answer the question: If you e.g. live in spain but you have installed WordPress in english (rember the en_US constant), than the Facebook plugin will not be translating to spanish. It will use WordPress' "language": english. 

== Screenshots ==

1. The comment form shows up, if you are logged in to your facebook account.
2. If you post a comment, it will show up underneath the comment form.

== Changelog ==

= 1.6 =

* Added a option to change the color scheme from light to dark on reverse.

= 1.5 =

* Fixed the handling of posts that have the Comments closed options selected.

= 1.4 =

* Change the handling of the core language to prevent undefined language errors.

= 1.3 =

* Added a options panel.
* Applied translations based on the WordPress core language.

= 1.2 =

* Fixed the language support for the plugin itselfe. Now it uses WordPress' language attribute.

= 1.1 =

* Fixed a bug with the Facebook Plugin's site url. Changed from only using site url to use the posts very permalink.

= 1.0 =

* Initial release.