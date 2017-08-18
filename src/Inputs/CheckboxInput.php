<?php
/**
 * Created by Petr Čech (czubehead) : https://petrcech.eu
 * Date: 9.7.17
 * Time: 20:02
 * This file belongs to the project bootstrap-4-forms
 * https://github.com/czubehead/bootstrap-4-forms
 */

namespace Czubehead\BootstrapForms\Inputs;


use Nette\Forms\Controls\Checkbox;
use Nette\Utils\Html;


class CheckboxInput extends Checkbox
{
	/**
	 * Generates a checkbox
	 * @return Html
	 */
	public function getControl()
	{
		parent::getControl();

		return self::makeCheckbox($this->name, $this->caption, $this->value, FALSE, $this->required,
			$this->disabled);
	}

	/**
	 * Makes a Bootstrap checkbox
	 * @param string      $name
	 * @param string|null $caption
	 * @param bool        $checked
	 * @param bool|mixed  $value pass false to omit
	 * @param bool        $required
	 * @param bool        $disabled
	 * @return Html
	 */
	public static function makeCheckbox($name, $caption = NULL, $checked = FALSE, $value = FALSE, $required =
	FALSE,
	                                    $disabled = FALSE)
	{
		$label = Html::el('label', ['class' => 'custom-control custom-checkbox']);
		$input = Html::el('input', [
			'type'     => 'checkbox',
			'class'    => 'custom-control-input',
			'name'     => $name,
			'disabled' => $disabled,
			'required' => $required,
			'checked'  => $checked,
		]);
		$indicator = Html::el('span', [
			'class' => 'custom-control-indicator',
		]);
		$description = Html::el('span', [
			'class' => 'custom-control-description',
		]);
		$description->setText($caption);
		if ($value !== FALSE) {
			$input->attrs += [
				'value' => $value,
			];
		}

		$label->addHtml($input);
		$label->addHtml($indicator);
		$label->addHtml($description);

		$line = Html::el('div', [
			'class' => 'form-check' . ($disabled ? ' disabled' : ''),
		]);
		$line->setHtml($label);

		return $label;
	}
}