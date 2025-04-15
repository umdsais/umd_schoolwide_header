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

    $theme_config = \Drupal::config('system.theme');
    $default_theme = $theme_config->get('default');

    if($default_theme !== 'umd_terp') {
      $form['theme_help_text'] = [
        '#markup' => '<p>You are <strong>NOT</strong> using the <strong>UMD Terp Theme</strong>, so the UMD Brand design system JS files will be loaded, as they are needed to run the schoolwide header.</p>',
      ];
    } else {
      $form['theme_help_text'] = [
        '#markup' => '<p>You are using the <strong>UMD Terp Theme</strong>, so the UMD Brand design system JS files will not be loaded, as they are included in the UMD Terp Theme.</p>',
      ];
    }

    $form['help_text'] = [
      '#markup' => '<p>These setting correspond to the <a href="https://brand.umd.edu/website-guidelines/university-header-guidelines">UMD Brand Guidelines</a>.</p>',
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

    // Search
    $form['umd_schoolwide_header_settings']['advanced']['hide_search'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide the Search Box'),
      '#default_value' => $config->get('umd_schoolwide_header.hide_search'),
    ];

    // Depreciated
    $form['umd_schoolwide_header_settings']['depreciated'] = [
      '#type' => 'details',
      '#title' => t('Depreciated'),
    ];

    // URL of the old Depreciated API.
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
    $config->set('umd_schoolwide_header.hide_search', $form_state->getValue('hide_search'));
    $config->set('umd_schoolwide_header.hide_admissions', $form_state->getValue('hide_admissions'));
    $config->set('umd_schoolwide_header.hide_giving', $form_state->getValue('hide_giving'));
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
