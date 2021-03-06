<?php

use In2code\Groupmailer\Domain\Model\Mailing;
use In2code\Groupmailer\Workflow\Workflow;
use TYPO3\CMS\Core\Mail\FluidEmail;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE,
        'label' => 'subject',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'default_sortby' => 'ORDER BY tstamp ASC',
        'delete' => 'deleted',
        'type' => 'context',
        'typeicon_classes' => [
            'fe' => 'tx-groupmailer-frontend-mail',
            'be' => 'tx-groupmailer-backend-mail',
        ],
        'typeicon_column' => 'context',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'rootLevel' => -1
    ],
    'interface' => [
        'showRecordFieldList' => 'be_groups,fe_groups,workflow_state,subject,bodytext,mail_format,sender_mail,sender_name,mail_queue_generated,hidden',
    ],
    'types' => [
        'fe' => ['showitem' => 'context,fe_groups,workflow_state,subject,bodytext,attachments,mail_format,--palette--;LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.sender;sender,mail_queue_generated,hidden'],
        'be' => ['showitem' => 'context,be_groups,workflow_state,subject,bodytext,attachments,mail_format,--palette--;LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.sender;sender,mail_queue_generated,hidden'],
    ],
    'palettes' => [
        'sender' => [
            'showitem' => 'sender_mail,--linebreak--,sender_name,',
            'canNotCollapse' => 1,
        ],
    ],
    'columns' => [
        'context' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:context',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:context.frontend', 'fe'],
                    ['LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:context.backend', 'be'],
                ]
            ]
        ],
        'be_groups' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.be_groups',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'be_groups',
                'MM' => 'tx_groupmailer_mailing_be_groups_mm',
                'foreign_table_where' => 'ORDER BY title ASC',
                'size' => 5,
                'minitems' => 1,
            ]
        ],
        'fe_groups' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.fe_groups',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'fe_groups',
                'MM' => 'tx_groupmailer_mailing_fe_groups_mm',
                'foreign_table_where' => 'ORDER BY title ASC',
                'size' => 5,
                'minitems' => 1,
            ]
        ],
        'workflow_state' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.workflow_state',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.workflow_state.' . Workflow::STATE_DRAFT,
                        Workflow::STATE_DRAFT
                    ],
                    [
                        'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.workflow_state.' . Workflow::STATE_REVIEW,
                        Workflow::STATE_REVIEW
                    ],
                    [
                        'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.workflow_state.' . Workflow::STATE_APPROVED,
                        Workflow::STATE_APPROVED
                    ],
                    [
                        'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.workflow_state.' . Workflow::STATE_REJECTED,
                        Workflow::STATE_REJECTED
                    ],
                ],
                'default' => Workflow::STATE_DRAFT,
            ],
        ],
        'subject' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.subject',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim,required',
                'max' => 255,
            ],
        ],
        'bodytext' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.bodytext',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim,required',
            ],
        ],
        'attachments' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.attachments',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('attachments'),
        ],
        'mail_format' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.mail_format',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.mail_format.' . FluidEmail::FORMAT_BOTH,
                        FluidEmail::FORMAT_BOTH
                    ],
                    [
                        'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.mail_format.' . FluidEmail::FORMAT_HTML,
                        FluidEmail::FORMAT_HTML
                    ],
                    [
                        'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.showinviews.' . FluidEmail::FORMAT_PLAIN,
                        FluidEmail::FORMAT_PLAIN
                    ],
                ],
                'default' => FluidEmail::FORMAT_BOTH,
            ]
        ],
        'sender_mail' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.sender_mail',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim',
                'max' => 255,
            ],
        ],
        'sender_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.sender_name',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim',
                'max' => 255,
            ],
        ],
        'mail_queue_generated' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.mail_queue_generated',
            'config' => [
                'type' => 'check',
                'readOnly' => true
            ]
        ],
        'rejected' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . Mailing::TABLE . '.rejected',
            'config' => [
                'type' => 'check',
                'readOnly' => true
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ]
        ],
        'deleted' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.delete',
            'config' => [
                'type' => 'check',
            ]
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
            ]
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
            ]
        ],
    ]
];
