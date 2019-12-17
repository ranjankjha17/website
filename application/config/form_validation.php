<?php
$config=[
            'register_validation'=>[
                                          [
                                          'field'=>'username',
                                          'label'=>'User Name',
                                          'rules'=>'required|trim'
                                        ],

                                        [
                                        'field'=>'firstname',
                                        'label'=>'First Name',
                                        'rules'=>'required|alpha'
                                      ],

                                      [
                                      'field'=>'lastname',
                                      'label'=>'Last Name',
                                      'rules'=>'required|alpha'
                                    ],

                                    [
                                    'field'=>'email',
                                    'label'=>'Email',
                                    'rules'=>'required|valid_email|is_unique[users.email]|trim'
                                  ],

                                  [
                                  'field'=>'password',
                                  'label'=>'Password',
                                  'rules'=>'required|trim|max_length[12]'
                                ]
                              ],
            'add_article_rules'=>[
                              [
                                'field'=>'article_title',
                                'label'=>'Article Title',
                                'rules'=>'required'
                              ],
                              [
                                'field'=>'article_body',
                                'label'=>'Article Body',
                                'rules'=>'required'
                              ]
                          ],

        ];


 ?>
