<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function creatica_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['creatica_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('creatica Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['creatica_settings']['show_front_content'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show content and sidebar on front page'),
    '#default_value' => theme_get_setting('show_front_content','creatica'),
    '#description' => t('Check this option to show content and sidebar on the front page.'),
  );
  $form['creatica_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs','creatica'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );

}

