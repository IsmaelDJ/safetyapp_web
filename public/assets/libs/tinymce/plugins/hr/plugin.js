/**
 * Copyright (c) Tiny Technologies, Inc. All rights reserved.
 * Licensed under the LGPL or a commercial license.
 * For LGPL see License.txt in the project root for license information.
 * For commercial licenses see https://www.tiny.cloud/
 *
<<<<<<< HEAD
 * Version: 5.10.4 (2022-04-27)
=======
 * Version: 5.10.0 (2021-10-11)
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
 */
(function () {
    'use strict';

    var global = tinymce.util.Tools.resolve('tinymce.PluginManager');

    var register$1 = function (editor) {
      editor.addCommand('InsertHorizontalRule', function () {
        editor.execCommand('mceInsertContent', false, '<hr />');
      });
    };

    var register = function (editor) {
      var onAction = function () {
        return editor.execCommand('InsertHorizontalRule');
      };
      editor.ui.registry.addButton('hr', {
        icon: 'horizontal-rule',
        tooltip: 'Horizontal line',
        onAction: onAction
      });
      editor.ui.registry.addMenuItem('hr', {
        icon: 'horizontal-rule',
        text: 'Horizontal line',
        onAction: onAction
      });
    };

    function Plugin () {
      global.add('hr', function (editor) {
        register$1(editor);
        register(editor);
      });
    }

    Plugin();

}());
