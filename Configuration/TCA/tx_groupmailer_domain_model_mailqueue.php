<?php

use In2code\Groupmailer\Domain\Model\Mailing;
use In2code\Groupmailer\Domain\Model\MailQueue;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . MailQueue::TABLE,
        'label' => 'mailing',
        'label_alt' => 'be_user, fe_user',
        'label_alt_force' => 1,
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
        'showRecordFieldList' => 'mailing,be_user,fe_user,sent,error',
    ],
    'types' => [
        'fe' => ['showitem' => 'context,mailing,fe_user,sent,error'],
        'be' => ['showitem' => 'context,mailing,be_user,sent,error'],
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
        'mailing' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . MailQueue::TABLE . '.mailing',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => Mailing::TABLE,
                'foreign_table_where' => 'AND sys_language_uid in (0,-1)',
                'default' => 0,
            ]
        ],
        'be_user' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . MailQueue::TABLE . '.be_user',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'be_users',
                'default' => 0,
            ]
        ],
        'fe_user' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . MailQueue::TABLE . '.fe_user',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'fe_users',
                'default' => 0,
            ]
        ],
        'error' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . MailQueue::TABLE . '.error',
            'config' => [
                'type' => 'check',
                'readOnly' => true
            ]
        ],
        'sent' => [
            'exclude' => true,
            'label' => 'LLL:EXT:groupmailer/Resources/Private/Language/locallang_db.xlf:' . MailQueue::TABLE . '.sent',
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
        ]
    ]
];
