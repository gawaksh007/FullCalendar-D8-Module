<?php

namespace Drupal\jscal\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\user\Entity\Role;

/**
 *Class jscal
 */
class jscal extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'jscal.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'jscal_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('jscal.settings');

    $form['cal_title'] = [
      '#type' => 'textfield',
      '#title' => ' Title ',
      '#description' => 'Enter the title of the event?',
      '#default_value' => $config->get('cal_title'),
    ];
    $form['cal_description'] = [
      '#type' => 'text_format',
      '#title' => ' Description',
      '#description' => 'Please describe the event.',
      '#default_value' => $config->get('cal_description.value'),
    ];
    $form['cal_start_date'] = [
      '#type' => 'datetime',
      '#title' => ' Start Date ',
      '#description' => 'Add Event Start Date ',
      '#default_value' => $config->get('cal_start_date'),
    ];
    $form['cal_end_date'] = [
      '#type' => 'datetime',
      '#title' => ' End Date ',
      '#description' => 'Add Event End Date ',
      '#default_value' => $config->get('cal_end_date'),
    ];
   // $defaultRoles = $config->get('roles');
    //$roles = Role::loadMultiple();
    //$options = [];
    //foreach ($roles as $role) {
      //$options[$role->id()] = $role->label();
    //}

    //$form['roles'] = [
      //'#type' => 'checkboxes',
      //'#title' => t('Select roles to show Adblock popup'),
      //'#options' => $options,
      //'#default_value' => isset($defaultRoles) ? $defaultRoles : FALSE,
    //];

    //$form['cache'] = [
      //'#cache' => [
        //'max-age' => 0,
      //],
    //];

    return parent::buildForm($form, $form_state);
  }

 /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    // Get the config object.
    $config = $this->config('jscal.settings');

    $title = $form_state->getValue('cal_title');
    $description = $form_state->getValue('cal_description')['value'];
    $cal_start_date = $form_state->getValue('cal_start_date');
    $cal_end_date = $form_state->getValue('cal_end_date');
    //$roles = $form_state->getValue('roles');
    // Set the values the user submitted in the form.
    $config->set('kadb_title', $title)
      ->set('cal_description.value', $description)
      ->set('cal_start_date', $cal_start_date)
      ->set('cal_end_date', $cal_end_date)
      ->save();
  }
}