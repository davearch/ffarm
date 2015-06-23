(function () {
    tinymce.PluginManager.add('shortcode_tinymce_button', function (editor, url) {
        editor.addButton('shortcode_tinymce_button', {
            title: 'Shortcode generator',
            type: 'menubutton',
            icon: 'icon bnk-shortcode-icon',
            menu: [
                {
                    text: 'Columns Layout',
                    value: 'Columns Layout',
                    menu: [
                        {
                            text: '2 Columns',
                            value: '2 Columns',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[one_half] Insert content here [/one_half] [one_half_omega] Insert content here[/one_half_omega]");
                            }
                        },
                        {
                            text: '3 Columns',
                            value: '3 Columns',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[one_third] Insert content here [/one_third] [one_third] Insert content here[/one_third] [one_third_omega] Insert content here[/one_third_omega]");
                            }
                        },
                        {
                            text: '4 Columns',
                            value: '4 Columns',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[one_fourth] Insert content here [/one_fourth] [one_fourth] Insert content here[/one_fourth] [one_fourth] Insert content here[/one_fourth] [one_fourth_omega] Insert content here[/one_fourth_omega]");
                            }
                        },
                        {
                            text: 'Divider line',
                            value: 'line',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[line]");
                            }
                        },
                        {
                            text: 'Clearfix',
                            value: 'clear',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[clear]");
                            }
                        }

                    ]
                },
                {
                    text: 'Notification Box',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Insert notification box',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'title',
                                    label: 'Notification text'
                                },
                                {
                                    type: 'listbox',
                                    name: 'type',
                                    label: 'Notification box type',
                                    'values': [
                                        {text: 'Confirm', value: 'ok'},
                                        {text: 'Secure', value: 'secure'},
                                        {text: 'Info', value: 'info'},
                                        {text: 'Error', value: 'error'},
                                        {text: 'Note', value: 'note'}

                                    ]
                                }

                            ],
                            onsubmit: function (e) {
                                var setType;
                                if (e.data.type) {
                                    setType = e.data.type
                                } else {
                                    setType = "ok"
                                }

                                editor.insertContent("["+setType+"] " + e.data.title + " [/"+setType+"]");
                            }
                        })
                    }
                },
                {
                    text: 'UI',
                    value: 'UI',
                    menu: [
                        {
                            text: 'Features Tab',
                            value: 'features',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[features tab1=\"Tab 1 Title\" tab2=\"Tab 2 Title\" tab3=\"Tab 3 Title\"] [featurestab] Insert content here. [/featurestab] [featurestab] Insert content here. [/featurestab]  [featurestab] Insert content here. [/featurestab] [/features]")
                            }
                        },
                        {
                            text: 'Tabs',
                            value: 'tabs',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[tabs tab1=\"Tab 1 Title\" tab2=\"Tab 2 Title\" tab3=\"Tab 3 Title\"] [tab] Insert Tab 1 content here [/tab] [tab] Insert Tab 2 content here [/tab] [tab] Insert Tab 3 content here [/tab] [/tabs]")
                            }
                        },
                        {
                            text: 'Toggle',
                            value: 'toggle',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[toggle title=\"Toggle Title here\"] Insert content here. [/toggle]");
                            }
                        },
                        {
                            text: 'Accordion',
                            value: 'accordion',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[acc title=\"Accordion 1 Title here\"] Insert content here. [/acc] [acc title=\"Accordion 2 Title here\"] Insert content here. [/acc] [acc title=\"Accordion 3 Title here\"] Insert content here. [/acc]")

                            }
                        }


                    ]
                },
                {
                    text: 'Miscellaneous Elements',
                    value: 'miscellaneous',
                    menu: [
                        {
                            text: 'Tool Tip',
                            value: 'tooltip',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[tip position=\"top\" title=\"Insert Tooltip content here\" ]Insert text here[/tip]")
                            }
                        },
                        {
                            text: 'Left Pull Quotes',
                            value: 'pullquote_left',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[pullquote_left] Insert content here [/pullquote_left]")
                            }
                        },
                        {
                            text: 'Right Pull Quotes',
                            value: 'pullquote_right',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[pullquote_right] Insert content here [/pullquote_right]")
                            }
                        },
                        {
                            text: 'Blockquote',
                            value: 'quote',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[quote] Insert content here [/quote]")
                            }
                        },
                        {
                            text: 'Check List',
                            value: 'checklist',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[checklist]<li>List item 1</li><li>List item 2</li><li>List item 3</li>[/checklist]")
                            }
                        },
                        {
                            text: 'Table',
                            value: 'table',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[table]<table> <thead> <tr> <th></th> <th>Column 1</th> <th>Column 2</th> </tr> </thead> <tbody> <tr> <td>1</td> <td>Lorem ipsum</td> <td>consectetur adipiscing</td> </tr> <tr> <td>2</td> <td>Vestibulum eleifend</td> <td>nunc rutrum</td> </tr> </tbody></table>[/table]")
                            }
                        },
                        {
                            text: 'Stripped Table',
                            value: 'stripped_table',
                            onclick: function (e) {
                                e.stopPropagation();
                                editor.insertContent("[stripped_table]<table> <thead> <tr> <th></th> <th>Column 1</th> <th>Column 2</th> </tr> </thead> <tbody> <tr> <td>1</td> <td>Lorem ipsum</td> <td>consectetur adipiscing</td> </tr> <tr> <td>2</td> <td>Vestibulum eleifend</td> <td>nunc rutrum</td> </tr> </tbody></table>[/stripped_table]")
                            }
                        }
                    ]
                },
                {
                    text: 'Button',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Insert button',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'title',
                                    label: 'Button text'
                                },
                                {
                                    type: 'textbox',
                                    name: 'url',
                                    label: 'URL'
                                },
                                {
                                    type: 'checkbox',
                                    name: 'target',
                                    checked: false,
                                    label: 'Open URL in a new window'
                                },
                                {
                                    type: 'listbox',
                                    name: 'style',
                                    label: 'Button style',
                                    'values': [
                                        {text: 'Normal button', value: 'normal'},
                                        {text: 'Button with arrow', value: 'arrow'},
                                        {text: 'Small button', value: 'small'}

                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'position',
                                    label: 'Button position',
                                    'values': [
                                        {text: 'Left', value: 'left'},
                                        {text: 'Right', value: 'right'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'color',
                                    label: 'Button color',
                                    'values': [
                                        {text: 'Primary', value: 'primary'},
                                        {text: 'White', value: 'basic'},
                                        {text: 'Blue', value: 'action'},
                                        {text: 'Red', value: 'danger'},
                                        {text: 'Green', value: 'success'},
                                        {text: 'Blue', value: 'info'}
                                    ]
                                }
                            ],
                            onsubmit: function (e) {
                                var setTarget;
                                var setStyle;
                                if (e.data.target) {
                                    setTarget = "target=\"_blank\""
                                } else {
                                    setTarget = ""
                                }
                                ;
                                if (e.data.style == 'small') {
                                    setStyle = "small_"
                                } else if (e.data.style == 'arrow') {
                                    setStyle = "arrow_"
                                } else {
                                    setStyle = ""
                                }

                                editor.insertContent("[btn_" + setStyle + "" + e.data.color + " url=\"" + e.data.url + "\" " + setTarget + " position=\"" + e.data.position + "\"]  " + e.data.title + "  [/btn_" + setStyle + "" + e.data.color + "]");
                            }
                        });
                    }
                }

            ]
        });
    });
})();