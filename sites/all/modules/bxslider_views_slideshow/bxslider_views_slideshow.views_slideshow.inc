<?php

/**
 *  @file
 *  The default options available with Views Slideshow: BxSlider.
 */

 /**
 * Define the type of the slideshow (eg.: cycle, imageflow, ddblock).
 *
 * @return
 *   Associative array of slideshow type and its information.
 */
function bxslider_views_slideshow_views_slideshow_slideshow_info() {
  $options = array(
    'bxslider_views_slideshow' => array(
      'name' => t('BxSlider'),
      'accepts' => array(
        'goToSlide',
        'nextSlide',
        'previousSlide',
      ),
      'calls' => array(
        'goToSlide',
        'nextSlide',
        'previousSlide',
      ),
    ),
  );
  return $options;
}


/**
 *  Implements hook_views_slideshow_options_form().
 */
function bxslider_views_slideshow_views_slideshow_slideshow_type_form(&$form, &$form_state, &$view) {
  if (!$bxslider_path = _bxslider_views_slideshow_library_path()) {
    drupal_set_message(t('You need to install the BxSlider plugin. You can find the plugin at !url.', array('!url' => l('http://bxslider.com', 'http://bxslider.com', array('attributes' => array('target' => '_blank'))))), 'error');
  }

  // Create the form elements for our BxSlider view options.
  $form['bxslider_views_slideshow'] = array(
    '#type' => 'fieldset',
    '#title' => t('BxSlider options'),
    '#description' => t("These options affect the slideshow when it's in the !bxslider mode. Please see the !documentation for more information.", array('!bxslider' => l(t('BxSlider'), 'http://bxslider.com', array('attributes' => array('target' => 'blank'))), '!documentation' => l(t('documentation'), 'http://bxslider.com/options', array('attributes' => array('target' => '_blank'))))),
    '#collapsible' => TRUE,
    '#collapsed' => !($view->options['mode'] == 'bxslider_views_slideshow'),
  );
  $form['bxslider_views_slideshow']['controlsfieldset'] = array(
    '#type' => 'fieldset',
    '#title' => t('Controls'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['bxslider_views_slideshow']['pagerfieldset'] = array(
    '#type' => 'fieldset',
    '#title' => t('Pager'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['bxslider_views_slideshow']['autofieldset'] = array(
    '#type' => 'fieldset',
    '#title' => t('Auto'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['bxslider_views_slideshow']['carousel'] = array(
    '#type' => 'fieldset',
    '#title' => t('Carousel'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  // FORM
  $form['bxslider_views_slideshow']['mode'] = array(
    '#type' => 'select',
    '#title' => t('Mode'),
    '#description' => t('Type of transition between slides'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['mode']) ? $view->options['bxslider_views_slideshow']['mode'] : 'horizontal',
    '#options' => array(
      'horizontal' => 'horizontal',
      'vertical' => 'vertical',
      'fade' => 'fade',
    ),
  );
  $form['bxslider_views_slideshow']['speed'] = array(
    '#type' => 'textfield',
    '#title' => t('Speed'),
    '#description' => t('Slide transition duration (in ms)'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['speed']) ? $view->options['bxslider_views_slideshow']['speed'] : 500,
  );
  $form['bxslider_views_slideshow']['slideMargin'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide margin'),
    '#description' => t('Margin between each slide.'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['slideMargin']) ? $view->options['bxslider_views_slideshow']['slideMargin'] : 0,
  );
  $form['bxslider_views_slideshow']['startSlide'] = array(
    '#type' => 'textfield',
    '#title' => t('Start slide'),
    '#description' => t('Starting slide index (zero-based)'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['startSlide']) ? $view->options['bxslider_views_slideshow']['startSlide'] : 0,
  );
  $form['bxslider_views_slideshow']['randomStart'] = array(
    '#type' => 'checkbox',
    '#title' => t('Random start'),
    '#description' => t('Start slider on a random slide'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['randomStart']) ? $view->options['bxslider_views_slideshow']['randomStart'] : FALSE,
  );
  $form['bxslider_views_slideshow']['infiniteLoop'] = array(
    '#type' => 'checkbox',
    '#title' => t('Inifinite loop'),
    '#description' => t('If true, clicking "Next" while on the last slide will transition to the first slide and vice-versa'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['infiniteLoop']) ? $view->options['bxslider_views_slideshow']['infiniteLoop'] : TRUE,
  );
  $form['bxslider_views_slideshow']['hideControlsOnEnd'] = array(
    '#type' => 'checkbox',
    '#title' => t('Hide controls on end ?'),
    '#description' => t('If true, "Next" control will be hidden on last slide and vice-versa
Note: Only used when infiniteLoop: false'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['hideControlsOnEnd']) ? $view->options['bxslider_views_slideshow']['hideControlsOnEnd'] : FALSE,
  );
  $form['bxslider_views_slideshow']['captions'] = array(
    '#type' => 'checkbox',
    '#title' => t('Captions'),
    '#description' => t('Include image captions. Captions are derived from the image\'s title attribute'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['captions']) ? $view->options['bxslider_views_slideshow']['captions'] : FALSE,
  );
  $form['bxslider_views_slideshow']['ticker'] = array(
    '#type' => 'checkbox',
    '#title' => t('Ticker mode'),
    '#description' => t('Use slider in ticker mode (similar to a news ticker)'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['ticker']) ? $view->options['bxslider_views_slideshow']['ticker'] : FALSE,
  );
  $form['bxslider_views_slideshow']['tickerHover'] = array(
    '#type' => 'checkbox',
    '#title' => t('Ticker hover'),
    '#description' => t('Ticker will pause when mouse hovers over slider. Note: this functionality does NOT work if using CSS transitions!'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['tickerHover']) ? $view->options['bxslider_views_slideshow']['tickerHover'] : FALSE,
  );
  $form['bxslider_views_slideshow']['adaptiveHeight'] = array(
    '#type' => 'checkbox',
    '#title' => t('Adaptive height'),
    '#description' => t('Dynamically adjust slider height based on each slide\'s height'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['adaptiveHeight']) ? $view->options['bxslider_views_slideshow']['adaptiveHeight'] : FALSE,
  );
  $form['bxslider_views_slideshow']['adaptiveHeightSpeed'] = array(
    '#type' => 'textfield',
    '#title' => t('Adaptive height speed'),
    '#description' => t('Slide height transition duration (in ms). Note: only used if adaptiveHeight: true'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['adaptiveHeightSpeed']) ? $view->options['bxslider_views_slideshow']['adaptiveHeightSpeed'] : 500,
  );
  $form['bxslider_views_slideshow']['video'] = array(
    '#type' => 'checkbox',
    '#title' => t('Video'),
    '#description' => t('If any slides contain video, set this to true. Also, include plugins/jquery.fitvids.js
See http://fitvidsjs.com/ for more info'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['video']) ? $view->options['bxslider_views_slideshow']['video'] : FALSE,
  );
  $form['bxslider_views_slideshow']['touchEnabled'] = array(
    '#type' => 'checkbox',
    '#title' => t('Touch enabled'),
    '#description' => t('If true, slider will allow touch swipe transitions'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['touchEnabled']) ? $view->options['bxslider_views_slideshow']['touchEnabled'] : TRUE,
  );
  $form['bxslider_views_slideshow']['preloadImages'] = array(
    '#type' => 'select',
    '#title' => t('Preload all images?'),
    '#description' => t('If all, preloads all images before starting the slider. If visible, preloads only images in the initially visible slides before starting the slider (tip: use visible if all slides are identical dimensions)'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['preloadImages']) ? $view->options['bxslider_views_slideshow']['preloadImages'] : 'visisble',
    '#options' => array(
      'all' => 'all',
      'visible' => 'visible',
    ),
  );
  $form['bxslider_views_slideshow']['disable_standard_css'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use own CSS ?'),
    '#description' => t('Do you want to use the standard css or include your own ?'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['disable_standard_css']) ? $view->options['bxslider_views_slideshow']['disable_standard_css'] : FALSE,
  );
  $form['bxslider_views_slideshow']['use_css_transition'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use CSS transitions'),
    '#description' => t('Use hardware-accelerated CSS transitions.  Fallback is jQuery.animate()'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['useCSS']) ? $view->options['bxslider_views_slideshow']['use_css_transition'] : TRUE,
  );
  $form['bxslider_views_slideshow']['align_image'] = array(
    '#type' => 'select',
    '#title' => t('Alignment Image'),
    '#description' => t('Do you want to align the image?'),
    '#options' => array(
      'left' => 'left',
      'center' => 'center',
      'right' => 'right',
    ),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['align_image']) ? $view->options['bxslider_views_slideshow']['align_image'] : 'left',
  );
  $form['bxslider_views_slideshow']['swipeThreshold'] = array(
    '#type' => 'textfield',
    '#title' => t('Swipe treshold default: 50'),
    '#description' => t('Amount of pixels a touch swipe needs to exceed in order to execute a slide transition. Note: only used if touchEnabled: tru.'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['swipeThreshold']) ? $view->options['bxslider_views_slideshow']['swipeThreshold'] : 50,
  );
  $form['bxslider_views_slideshow']['oneToOneTouch'] = array(
    '#type' => 'checkbox',
    '#title' => t('One to One touch'),
    '#description' => t('If true, non-fade slides follow the finger as it swipes'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['oneToOneTouch']) ? $view->options['bxslider_views_slideshow']['oneToOneTouch'] : TRUE,
  );
  $form['bxslider_views_slideshow']['preventDefaultSwipeX'] = array(
    '#type' => 'checkbox',
    '#title' => t('Prevent swipe X'),
    '#description' => t(' If true, touch screen will not move along the x-axis as the finger swipes'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['preventDefaultSwipeX']) ? $view->options['bxslider_views_slideshow']['preventDefaultSwipeX'] : TRUE,
  );
  $form['bxslider_views_slideshow']['preventDefaultSwipeY'] = array(
    '#type' => 'checkbox',
    '#title' => t('Prevent swipe Y'),
    '#description' => t(' If true, touch screen will not move along the y-axis as the finger swipes'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['preventDefaultSwipeY']) ? $view->options['bxslider_views_slideshow']['preventDefaultSwipeY'] : FALSE,
  );
  // PAGER
  $form['bxslider_views_slideshow']['pagerfieldset']['pager'] = array(
    '#type' => 'checkbox',
    '#title' => t('Pager'),
    '#description' => t('If true, a pager will be added'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['pagerfieldset']['pager']) ? $view->options['bxslider_views_slideshow']['pagerfieldset']['pager'] : FALSE,
  );
  $form['bxslider_views_slideshow']['pagerfieldset']['pagerType'] = array(
    '#type' => 'select',
    '#title' => t('Pager type'),
    '#description' => t("If 'full', a pager link will be generated for each slide. If 'short', a x / y pager will be used (ex. 1 / 5)"),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['pagerfieldset']['pagerType']) ? $view->options['bxslider_views_slideshow']['pagerfieldset']['pagerType'] : 'full',
    '#options' => array(
      'full' => 'full',
      'short' => 'short',
    ),
  );
  $form['bxslider_views_slideshow']['pagerfieldset']['pagerShortSeparator'] = array(
    '#type' => 'textfield',
    '#title' => t('Pager short separator'),
    '#description' => t('If pagerType: short, pager will use this value as the separating character: default /'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['pagerfieldset']['pagerShortSeparator']) ? $view->options['bxslider_views_slideshow']['pagerfieldset']['pagerShortSeparator'] : ' / ',
  );
  // CONTROLS
  $form['bxslider_views_slideshow']['controlsfieldset']['controls'] = array(
    '#type' => 'checkbox',
    '#title' => t('Controls'),
    '#description' => t('If true, "Next" / "Prev" controls will be added'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['controlsfieldset']['controls']) ? $view->options['bxslider_views_slideshow']['controlsfieldset']['controls'] : TRUE,
  );
  $form['bxslider_views_slideshow']['controlsfieldset']['nextText'] = array(
    '#type' => 'textfield',
    '#title' => t('Next Text'),
    '#description' => t('Text to be used for the "Next" control'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['controlsfieldset']['nextText']) ? $view->options['bxslider_views_slideshow']['controlsfieldset']['nextText'] : '',
  );
  $form['bxslider_views_slideshow']['controlsfieldset']['prevText'] = array(
    '#type' => 'textfield',
    '#title' => t('Previous Text'),
    '#description' => t('Text to be used for the "Prev" control'),
    '#default_value' => $view->options['bxslider_views_slideshow']['controlsfieldset']['prevText'],
  );
  $form['bxslider_views_slideshow']['controlsfieldset']['startText'] = array(
    '#type' => 'textfield',
    '#title' => t('Start Text'),
    '#description' => t('Text to be used for the "Start" control'),
    '#default_value' => $view->options['bxslider_views_slideshow']['controlsfieldset']['startText'],
  );
  $form['bxslider_views_slideshow']['controlsfieldset']['stopText'] = array(
    '#type' => 'textfield',
    '#title' => t('Stop Text'),
    '#description' => t('Text to be used for the "Stop" control'),
    '#default_value' => $view->options['bxslider_views_slideshow']['controlsfieldset']['stopText'],
  );
  $form['bxslider_views_slideshow']['controlsfieldset']['autoControls'] = array(
    '#type' => 'checkbox',
    '#title' => t('Auto controls'),
    '#description' => t('If true, "Start" / "Stop" controls will be added'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['controlsfieldset']['autoControls']) ? $view->options['bxslider_views_slideshow']['controlsfieldset']['autoControls'] : FALSE,
  );
  $form['bxslider_views_slideshow']['controlsfieldset']['autoControlsCombine'] = array(
    '#type' => 'checkbox',
    '#title' => t('Auto controls combine'),
    '#description' => t('When slideshow is playing only "Stop" control is displayed and vice-versa'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['controlsfieldset']['autoControlsCombine']) ? $view->options['bxslider_views_slideshow']['controlsfieldset']['autoControlsCombine'] : FALSE,
  );
  // AUTO
  $form['bxslider_views_slideshow']['autofieldset']['pause'] = array(
    '#type' => 'textfield',
    '#title' => t('Pause'),
    '#description' => t('The amount of time (in ms) between each auto transition'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['autofieldset']['pause']) ? $view->options['bxslider_views_slideshow']['autofieldset']['pause'] : 4000,
  );
  $form['bxslider_views_slideshow']['autofieldset']['autoStart'] = array(
    '#type' => 'checkbox',
    '#title' => t('Auto Start'),
    '#description' => t('If checked, then the slide show will begin rotating after the specified time below.'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['autofieldset']['autoStart']) ? $view->options['bxslider_views_slideshow']['autofieldset']['autoStart'] : TRUE,
  );
  $form['bxslider_views_slideshow']['autofieldset']['auto'] = array(
    '#type' => 'checkbox',
    '#title' => t('Auto'),
    '#description' => t('Slides will automatically transition'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['autofieldset']) ? $view->options['bxslider_views_slideshow']['autofieldset'] : FALSE,
  );
  $form['bxslider_views_slideshow']['autofieldset']['autoHover'] = array(
    '#type' => 'textfield',
    '#title' => t('Auto hover'),
    '#description' => t('Auto show will pause when mouse hovers over slider'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['autofieldset']['autoHover']) ? $view->options['bxslider_views_slideshow']['autofieldset']['autoHover'] : FALSE,
  );
  $form['bxslider_views_slideshow']['autofieldset']['autoDelay'] = array(
    '#type' => 'textfield',
    '#title' => t('Auto delay'),
    '#description' => t('Time (in ms) auto show should wait before starting'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['autofieldset']['autoDelay']) ? $view->options['bxslider_views_slideshow']['autofieldset']['autoDelay'] : 0,
  );
  // CAROUSEL
  $form['bxslider_views_slideshow']['carousel']['minSlides'] = array(
    '#type' => 'textfield',
    '#title' => t('Minimum amount of slides'),
    '#description' => t('The minimum number of slides to be shown. Slides will be sized down if carousel becomes smaller than the original size..'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['carousel']['minSlides']) ? $view->options['bxslider_views_slideshow']['carousel']['minSlides'] : 1,
  );
  $form['bxslider_views_slideshow']['carousel']['maxSlides'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum slides'),
    '#description' => t('The maximum number of slides to be shown. Slides will be sized up if carousel becomes larger than the original size.'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['carousel']['maxSlides']) ? $view->options['bxslider_views_slideshow']['carousel']['maxSlides'] : 1,
  );
  $form['bxslider_views_slideshow']['carousel']['moveSlides'] = array(
    '#type' => 'textfield',
    '#title' => t('Move slides'),
    '#description' => t('The number of slides to move on transition. This value must be >= minSlides, and <= maxSlides. If zero (default), the number of fully-visible slides will be used.'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['carousel']['moveSlides']) ? $view->options['bxslider_views_slideshow']['carousel']['moveSlides']: 0,
  );
  $form['bxslider_views_slideshow']['carousel']['slideWidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide width'),
    '#description' => t('The width of each slide. This setting is required for all horizontal carousels! default 0'),
    '#default_value' => isset($view->options['bxslider_views_slideshow']['carousel']['slideWidth']) ? $view->options['bxslider_views_slideshow']['carousel']['slideWidth'] : 0,
  );
}


/**
 *  Implements hook_views_slideshow_option_definition().
 */
function bxslider_views_slideshow_views_slideshow_option_definition() {
  // Set our default options.
  $options['bxslider_views_slideshow'] = array(
    'contains' => array(
      'autoStart' => array('default' => TRUE),
      'mode' => array('default' => 'horizontal'),
      'speed' => array('default' => 500),
      'slideMargin' => array('default' => 0),
      'startSlide' => array('default' => 0),
      'randomStart' => array('default' => FALSE),
      'infiniteLoop' => array('default' => TRUE),
      'hideControlsOnEnd' => array('default' => FALSE),
      'captions' => array('default' => False),
      'pager' => array('default' => FALSE),
      'pagerType' => array('default' => 'short'),
      'controls' => array('default' => TRUE),
      'auto' => array('default' => FALSE),
      'pause' => array('default' => 4000),
      'minSlides' => array('default' => 1),
      'maxSlides' => array('default' => 1),
      'disable_standard_css' => array('default' => FALSE),
      'align_image' => array('default' => 'left'),
      'ticker' => array('default' => FALSE),
      'tickerHover' => array('default' => FALSE),
      'adaptiveHeight' => array('default' => FALSE),
      'adaptiveHeightSpeed' => array('default' => 500),
      'video' => array('default' => FALSE),
      'touchEnabled' => array('default' => TRUE),
      'preloadImages' => array('default' => 'visible'),
      'swipeThreshold' => array('default' => 50),
      'oneToOneTouch' => array('default' => TRUE),
      'preventDefaultSwipeX' => array('default' => TRUE),
      'preventDefaultSwipeY' => array('default' => FALSE),
      'pagerShortSeparator' => array('default' => ' / '),
      'nextText' => array('default' => ''),
      'prevText' => array('default' => ''),
      'startText' => array('default' => ''),
      'stopText' => array('default' => ''),
      'autoControls' => array('default' => FALSE),
      'autoControlsCombine' => array('default' => FALSE),
      'autoHover' => array('default' => FALSE),
      'autoDelay' => array('default' => 0),
      'moveSlides' => array('default' => 0),
      'slideWidth' => array('default' => 0),
      'use_css_transition' => array('default' => 1),
    ),
  );
  return $options;
}
