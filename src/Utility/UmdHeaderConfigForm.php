<?php

namespace Drupal\umd_schoolwide_header\Utility;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * {@inheritdoc}
 */
class UmdHeaderConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'umd_schoolwide_header_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('umd_schoolwide_header.settings');
    $form['help_text'] = [
      '#markup' => '<p>These setting correspond to the <a href="https://github.com/UMD-Digital/elements-utility-header/tree/master">UMD Schoolwide Header</a>.</p>',
    ];

    // General settings.
    $form['umd_schoolwide_header_settings'] = [
      '#type' => 'details',
      '#title' => 'Settings',
      '#open' => TRUE,
    ];

    // Events
    $form['umd_schoolwide_header_settings']['hide_events'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide the Events link'),
      '#default_value' => $config->get('umd_schoolwide_header.hide_events'),
    ];

    // News
    $form['umd_schoolwide_header_settings']['hide_news'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide the News link'),
      '#default_value' => $config->get('umd_schoolwide_header.hide_news'),
    ];

    // Colleges & Schools
    $form['umd_schoolwide_header_settings']['hide_schools'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide the Colleges & Schools link'),
      '#default_value' => $config->get('umd_schoolwide_header.hide_schools'),
    ];

    // Admissions
    $form['umd_schoolwide_header_settings']['hide_admissions'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide the Admissions link'),
      '#default_value' => $config->get('umd_schoolwide_header.hide_admissions'),
    ];

    // Giving
    $form['umd_schoolwide_header_settings']['hide_giving'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide the Make a Gift link'),
      '#default_value' => $config->get('umd_schoolwide_header.hide_giving'),
    ];


    // Advanced
    $form['umd_schoolwide_header_settings']['advanced'] = [
      '#type' => 'details',
      '#title' => t('Advanced'),
    ];

    // Giving URL 
    $form['umd_schoolwide_header_settings']['advanced']['giving_url'] = [
      '#type' => 'textfield',
      '#title' => t('Make a Gift URL Override'),
      '#default_value' => $config->get('umd_schoolwide_header.giving_url'),
      '#description' => t('By default, the URL for the Make a Gift  link will be to giving.umd.edu. If you wish to override that for this instance, you may enter a full URL here to the desired page, such as: https://giving.umd.edu/giving/showSchool.php?name=business '),
    ];

    // Wrapper Width
    $form['umd_schoolwide_header_settings']['advanced']['wrapper_width'] = [
      '#type' => 'textfield',
      '#title' => t('Wrapper width of the schoolwide header'),
      '#default_value' => $config->get('umd_schoolwide_header.wrapper_width'),
      '#description' => t('This will default to 1300 pixels if not overridden. To override, enter the number of pixels desired.'),
    ];

    // Padding
    $form['umd_schoolwide_header_settings']['advanced']['padding'] = [
      '#type' => 'textfield',
      '#title' => t('Padding of the schoolwide header'),
      '#default_value' => $config->get('umd_schoolwide_header.padding'),
      '#description' => t('This will default to 20 pixels if not overridden. To override, enter the number of pixels desired.'),
    ];

    // Depreciated
    $form['umd_schoolwide_header_settings']['depreciated'] = [
      '#type' => 'details',
      '#title' => t('Depreciated'),
    ];

    // URL of the API.
    $form['umd_schoolwide_header_settings']['depreciated']['embed'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Old Generator Snippet'),
      '#default_value' => $config->get('umd_schoolwide_header.embed'),
      '#required' => FALSE,
      '#description' => 'Snippet from UMD Schoolwide Header Generator. No longer used, left to assist in troubleshooting any previous installs. It references the older UMD header script, from the <a href="https://umd-header.umd.edu/generator/">UMD Header Generator</a>.',
    ];

    return $form;

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('umd_schoolwide_header.settings');
    $config->set('umd_schoolwide_header.hide_events', $form_state->getValue('hide_events'));
    $config->set('umd_schoolwide_header.hide_news', $form_state->getValue('hide_news'));
    $config->set('umd_schoolwide_header.hide_schools', $form_state->getValue('hide_schools'));
    $config->set('umd_schoolwide_header.hide_admissions', $form_state->getValue('hide_admissions'));
    $config->set('umd_schoolwide_header.hide_giving', $form_state->getValue('hide_giving'));
    $config->set('umd_schoolwide_header.giving_url', $form_state->getValue('giving_url'));
    $config->set('umd_schoolwide_header.wrapper_width', $form_state->getValue('wrapper_width'));
    $config->set('umd_schoolwide_header.padding', $form_state->getValue('padding'));
    $config->set('umd_schoolwide_header.embed', $form_state->getValue('embed'));
    $config->save();
    return parent::submitForm($form, $form_state);

  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'umd_schoolwide_header.settings',
    ];
  }

}
