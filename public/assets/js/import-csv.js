// File Path 表示
$('input[id=file]').change(function() {
    $('#filePath').val($(this).val());
});

// File APIに対応しているか確認
$(function() {
    if(window.File) {
        var file = document.getElementById('file');
        var result = document.getElementById('csv');

        // ファイル選択
        file.addEventListener('change', function(e) {
            // 選択されたファイルの情報を取得
            var fileData = e.target.files[0];

            var reader = new FileReader();
            // ファイル読取（失敗）
            reader.onerror = function() {
                alert('ファイル読取に失敗しました。')
            }
            // ファイル読取（成功）
            reader.onload = function() {
                // IE対策　改行コード「\r\n」->「\n」へ置換
                var lineArr = reader.result.replace(/\r\n/g, '\n');
                // 文頭と文末の余計な改行を除去
                lineArr = lineArr.replace(/^(\n+)|(\n+)$/g, '');
                // 行単位 分割
                lineArr = lineArr.split(/\n/);

                // 行と列の二次元配列へ
                var itemArr = [];
                for (var i = 0; i < lineArr.length; i++) {
                    itemArr[i] = lineArr[i].split(/,/);
                }

                // tableで出力
                var insert = '<tbody id="csv" class="text-left">';
                // 行単位
                for (var i = 1; i < itemArr.length; i++) {
                    insert += '<tr>';
                    // 列単位
                    for (var j = 0; j < itemArr[i].length; j++) {
                        switch (j) {
                            // チケット番号
                            case 0:
                                insert += '<td>';
                                insert += '<input type="text" name="ticket_no" value="';
                                insert += itemArr[i][j];
                                insert += '" readonly="true" />';
                                insert += '</td>';
                                break;
                            // プロジェクト
                            case 1:
                                insert += '<td>';
                                insert += '<input type="text" name="project" value="';
                                insert += itemArr[i][j];
                                insert += '" readonly="true" />';
                                insert += '</td>';
                                break;
                            // 題名
                            case 6:
                                insert += '<td>';
                                insert += '<input type="text" name="title" value="';
                                insert += itemArr[i][j];
                                insert += '" readonly="true" />';
                                insert += '</td>';
                                break;
                            // 担当者
                            case 8:
                                insert += '<td>';
                                insert += '<input type="text" name="handle_name" value="';
                                insert += itemArr[i][j];
                                insert += '" readonly="true" />';
                                insert += '</td>';
                                break;
                            // バージョン
                            case 11:
                                insert += '<td>';
                                insert += '<input type="text" name="version" value="';
                                insert += itemArr[i][j];
                                insert += '" readonly="true" />';
                                insert += '</td>';
                                break;
                            // 説明
                            case 20:
                                insert += '<td>';
                                insert += '<input type="textarea" name="description" value="';
                                insert += itemArr[i][j];
                                insert += '" readonly="true" />';
                                insert += '</td>';
                                // 議事録
                                insert += '<td>';
                                insert += '<textarea name="minute" class="form-control" rows="3">';
                                insert += '</textarea>';
                                insert += '</td>';
                                // メモ欄
                                insert += '<td>';
                                insert += '<textarea name="memo" class="form-control" rows="3">';
                                insert += '</textarea>';
                                insert += '</td>';
                                break;
                        }
                    }
                    insert += '</tr>';
                }
                insert += '</tbody>';
                result.innerHTML = insert;
            }

            // ファイル読取 実行
            reader.readAsText(fileData, 'Shift_JIS');
        }, false);
    }
});
