<?php

namespace Drupal\koob_natas\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DefaultForm.
 *
 * @package Drupal\koob_natas\Form
 */
class DefaultForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'koob_natas.Default',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('koob_natas.Default');
    $form['reservation'] = [
      '#type' => 'submit',
      '#title' => $this->t('Reservation'),
      '#description' => $this->t('CLIQUEZ LA POUR AVOIR LE POUVOIR ABSOLU !'),
      '#value' => $this->t('Reserver'),
    ];
    $form['book_id'] = [
      '#type' => 'hidden',
      '#title' => $this->t('id_livre'),
      '#default_value' => $config->get('book_id'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('koob_natas.Default')
      ->set('reservation', $form_state->getValue('reservation'))
      ->set('book_id', $form_state->getValue('book_id'))
      ->save();
  }

}
