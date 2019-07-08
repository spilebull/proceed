$(document).ready(function() {
    if(isAPIAvailable()) {
        $('#files').bind('change', handleFileSelect);
    }
});

function isAPIAvailable() {
    // Check for the various File API support.
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        // Great success! All the File APIs are supported.
        return true;
    } else {
        // source: File API availability - http://caniuse.com/#feat=fileapi
        // source: <output> availability - http://html5doctor.com/the-output-element/
        document.writeln('The HTML5 APIs used in this form are only available in the following browsers:<br />');
        // 6.0 File API & 13.0 <output>
        document.writeln(' - Google Chrome: 13.0 or later<br />');
        // 3.6 File API & 6.0 <output>
        document.writeln(' - Mozilla Firefox: 6.0 or later<br />');
        // 10.0 File API & 10.0 <output>
        document.writeln(' - Internet Explorer: Not supported (partial support expected in 10.0)<br />');
        // ? File API & 5.1 <output>
        document.writeln(' - Safari: Not supported<br />');
        // ? File API & 9.2 <output>
        document.writeln(' - Opera: Not supported');
        return false;
    }
}

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    var file = files[0];

    // read the file metadata
    var output = ''
    output += '<span style="font-weight:bold;">' + escape(file.name) + '</span><br />\n';
    output += ' - FileType: ' + (file.type || 'n/a') + '<br />\n';
    output += ' - FileSize: ' + file.size + ' bytes<br />\n';
    output += ' - LastModified: ' + (file.lastModifiedDate ? file.lastModifiedDate.toLocaleDateString() : 'n/a') + '<br />\n';

    // read the file contents
    printTable(file);

    // post the results
    $('#list').append(output);
}

function printTable(file) {
    var reader = new FileReader();
    reader.readAsText(file);
    reader.onload = function(event) {
        var csv = event.target.result;
        var data = $.csv.toArrays(csv);

        var html = '';
        // 行単位
        for(var row in data) {
            // １行目スキップ
            if (row == 0) { continue; }

            // １列単位
            html += '<tr>\r\n';
            for(var item in data[row]) {
                switch (item) {
                    // チケット番号
                    case '0':
                        html += '<th class="col-xs-1 col-sm-1 col-md-1">';
                        html += '<input type="hidden" name="minute[' + row + '][ticket_id]" value="' + data[row][item] + '" />';
                        html += '#' + data[row][item];
                        html += '</th>\r\n';
                        break;
                    // プロジェクト
                    case '1':
                        html += '<td class="col-xs-1 col-sm-1 col-md-1">';
                        html += '<input type="hidden" name="minute[' + row + '][project]" value="' + data[row][item] + '" />';
                        html += data[row][item];
                        html += '</td>\r\n';
                        break;
                    // 題名
                    case '6':
                        html += '<td>';
                        html += '<input type="text" name="minute[' + row + '][subject]" value="' + data[row][item] + '" readonly="true" />';
                        html += '</td>\r\n';
                        break;
                    // 担当者
                    case '8':
                        html += '<td>';
                        html += '<input type="text" name="minute[' + row + '][assigned_to]" value="' + data[row][item] + '" readonly="true" />';
                        html += '</td>\r\n';
                        break;
                    // バージョン
                    case '11':
                        html += '<td>';
                        html += '<input type="text" name="minute[' + row + '][version]" value="' + data[row][item] + '" readonly="true" />';
                        html += '</td>\r\n';
                        break;
                    // 説明
                    case '20':
                        html += '<td>';
                        html += '<textarea name="minute[' + row + '][description]" value="' + data[row][item] + '" rows="5" readonly="true">';
                        html += data[row][item] + '</textarea>';
                        html += '</td>\r\n';
                        // 議事録
                        html += '<td><textarea name="minute[' + row + '][minute]" rows="5"></textarea></td>\r\n';
                        // メモ欄
                        html += '<td><textarea name="minute[' + row + '][memo]" rows="5"></textarea></td>\r\n';
                        break;
                }
            }
            html += '</tr>\r\n';
        }
        $('#contents').html(html);
    };
    reader.onerror = function() {
        alert('Unable to read ' + file.fileName);
    };
}
