<?php

namespace Graduation\QuickorderingSystem\Block\Adminhtml\Quickorders\Edit;

/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_status;
    protected $_priority;
    protected $_category;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        // \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Graduation\QuickorderingSystem\Model\Source\Status $status,
        // \Graduation\QuickorderingSystem\Model\Source\Priority $priority,
        // \Graduation\QuickorderingSystem\Model\Source\Category $category,
        array $data = []
    ) {
        $this->_status = $status;
        // $this->_priority = $priority;
        // $this->_category = $category;
        // $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('quickorders_');
        if ($model->getId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'quickorder_id',
            'text',
            [
                'name' => 'quickorder_id',
                'label' => __('Quickorder Id'),
                'id' => 'quickorder_id',
                'title' => __('Quickorder Id'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => true,
            ]
        );
        $fieldset->addField(
            'customer_id',
            'text',
            [
                'name' => 'customer_id',
                'label' => __('Customer Id'),
                'id' => 'customer_id',
                'title' => __('Customer Id'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => true,
            ]
        );



        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'id' => 'name',
                'title' => __('Name'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => true,
            ]
        );
        $fieldset->addField(
            'email',
            'text',
            [
                'email' => 'email',
                'label' => __('Email'),
                'id' => 'email',
                'title' => __('Email'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => true,
            ]
        );
        $fieldset->addField(
            'phone',
            'text',
            [
                'phone' => 'phone',
                'label' => __('Phone'),
                'id' => 'phone',
                'title' => __('Phone'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => true,
            ]
        );
        $fieldset->addField(
            'sku',
            'text',
            [
                'sku' => 'sku',
                'label' => __('SKU'),
                'id' => 'sku',
                'title' => __('SKU'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => true,
            ]
        );



        // $fieldset->addField(
        //     'category',
        //     'select',
        //     [
        //         'name' => 'category',
        //         'label' => __('Category'),
        //         'id' => 'category',
        //         'title' => __('Category'),
        //         'class' => 'required-entry',
        //         'values' => $this->_category->toOptionArray(),
        //         'required' => true,
        //         'disabled' => true,
        //     ]
        // );

        // $fieldset->addField(
        //     'subject',
        //     'text',
        //     [
        //         'name' => 'subject',
        //         'label' => __('Subject'),
        //         'id' => 'subject',
        //         'title' => __('Subject'),
        //         'class' => 'required-entry',
        //         'required' => true,
        //         'disabled' => true,
        //     ]
        // );

        // $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

        // $fieldset->addField(
        //     'content',
        //     'editor',
        //     [
        //         'name' => 'content',
        //         'label' => __('Content'),
        //         'style' => 'height:36em;',
        //         'required' => true,
        //         'config' => $wysiwygConfig,
        //         'disabled' => true,
        //     ]
        // );
        // $fieldset->addField(
        //     'priority',
        //     'select',
        //     [
        //         'name' => 'priority',
        //         'label' => __('Priority'),
        //         'id' => 'priority',
        //         'title' => __('Priority'),
        //         'class' => 'required-entry',
        //         'values' => $this->_priority->toOptionArray(),
        //         'required' => true,
        //         'disabled' => true,
        //     ]
        // );
        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'id' => 'status',
                'title' => __('Status'),
                'class' => 'required-entry status',
                'values' => $this->_status->toOptionArray(),
                'required' => true,
            ]
        );


        $fieldset->addField(
            'created_at',
            'date',
            [
                'name' => 'created_at',
                'label' => __('Created Date'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from',
                'class' => 'required-entry',
                'style' => 'width:200px',
                'disabled' => true,
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
