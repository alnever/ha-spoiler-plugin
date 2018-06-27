Plugin Name: Ha! Spoiler Plugin
Plugin Uri: https://github.com/alnever/ha-spoiler-plugin
Description: Adds a shortcode to include spoilers into texts
Version: 1.0
Author: Alex Neverov
Author URI: http://alneverov.ru

The WordPress plugin for including spoilers into posts and pages.
Spoilers have a title and a content. The title is permanently shown on the page,
the content is hidden by default. The user may open a spoiler by clicking on the
icon in the spoiler's header.

v 1.0
usage
[ha_spoiler header="Spoiler header"]
<content>
[/ha_spoiler]

* header is optional parameter. If the parameters isn't setted, then the caption "Spoiler is shown"
* content is a text, which is shown as a spoiler

The admin panel has an options page for this plugin. Users can redefine css-classes to make the spoiler's view more compatible to the site's design.