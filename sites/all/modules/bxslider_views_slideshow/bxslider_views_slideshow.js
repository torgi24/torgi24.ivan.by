var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

/**
 *  @file
 *  Initiate the BxSlider plugin.
 */

(function ($) {
  Drupal.behaviors.viewsSlideshowBxslider = {
    attach: function (context, settings) {
      for (id in Drupal.settings.viewsSlideshowBxslider) {
        var html_id = id.replace(/_/g, '-');
        $('#' + html_id + ':not(.viewsSlideshowBxslider-processed)', context).addClass('viewsSlideshowBxslider-processed').each(function () {
          // Fire up the gallery.
          var settingsBxSlider = $.extend(
            {},
            Drupal.settings.viewsSlideshowBxslider[id]['general'],
            Drupal.settings.viewsSlideshowBxslider[id]['controlsfieldset'],
            Drupal.settings.viewsSlideshowBxslider[id]['pagerfieldset'],
            Drupal.settings.viewsSlideshowBxslider[id]['autofieldset'],
            Drupal.settings.viewsSlideshowBxslider[id]['carousel']
          );

          for (callback in Drupal.settings.viewsSlideshowBxslider[id]['callback']) {
            Drupal.settings.viewsSlideshowBxslider[id]['callback'][callback] = eval('(' + Drupal.settings.viewsSlideshowBxslider[id]['callback'][callback] + ')');
          }
          settingsBxSlider = $.extend({}, settingsBxSlider, Drupal.settings.viewsSlideshowBxslider[id]['callback']);

          $(this).bxSlider(settingsBxSlider);
        });
      }
    }
  };
}(jQuery));


}
/*
     FILE ARCHIVED ON 21:03:00 Apr 14, 2018 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 12:13:30 Jul 01, 2020.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  RedisCDXSource: 9.013
  esindex: 0.016
  PetaboxLoader3.resolve: 64.174 (2)
  captures_list: 76.817
  exclusion.robots: 0.236
  CDXLines.iter: 14.204 (3)
  exclusion.robots.policy: 0.22
  LoadShardBlock: 49.748 (3)
  load_resource: 204.51
  PetaboxLoader3.datanode: 105.914 (5)
*/