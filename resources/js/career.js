//const { get } = require("lodash");

 // Still in roleにチェックがある場合はEndedを非活性にする
 function disableEnded(){
    const stillInRole = document.getElementById('still_in_role');
    let endYear = document.getElementById('ended_year');
    let endMonth = document.getElementById('ended_month');

    if(stillInRole.checked){
        endYear.disabled = true;
        endMonth.disabled = true;
    }else{
        endYear.disabled = false;
        endMonth.disabled = false;
    }
}

// バリデーションエラーの場合、モーダルを再表示する
window.onload = function(){
    const error_msg1 = document.getElementById('test1');
    const error_msg2 = document.getElementById('test2');
    const error_msg3 = document.getElementById('test3');
    const error_msg4 = document.getElementById('test4');
    
    if((error_msg1 || error_msg2 || error_msg3 || error_msg4) != undefined){
        document.querySelector('#modal-1').classList.add('is-open');
        //let aria_hidden = modal.getAttribute('aria-hidden') === 'false';
    }
}

// 削除前に確認のメッセージを表示する
function deleteCareer(e){
    if(window.confirm('Do you really want to delete the career?')){
        console.log(document.getElementById('delete_'+e.dataset.id));
        document.getElementById('delete_'+e.dataset.id).submit();
    }
}

function openCareerEditModal(){
    const careerEdit = document.getElementById('career_edit');
    console.log('モーダルが開きます');
}

/***
 * save後日付の前後チェックを行う
 */

// $(function(){
//     $('#save').click(function(){
//         // 日付を取得
//         let started_year = $('#started_year').data('started_year');
//         let started_month = $('#started_month').data('started_month');
//         let ended_year = $('#ended_year').data('ended_year');
//         let ended_month = $('#ended_month').data('ended_month');
    
//         // 日付に変換する
//         let started_date = new Date($started_year, $started_month);
//         let ended_date = new Date($ended_year, $ended_month);
    
//         // 日付を比較する
//         if($started_date < $ended_date){
//             // モーダルを再表示
//             //$('#modal-1').addClass('is-open');
    
//             // エラーメッセージを返す
//             $error = 'error';
//         }else{
//             //function(){
//                 $.ajax({
//                     type: 'get',
//                     url: '/profile/me/create/career',
//                     dataType: 'json',
//                 }).done(function(response){
//                     // 通信成功時
//                     console.log('通信成功');
//                 }).fail(function(error){
//                     alert('通信失敗');
//                 });
//             //}
//         }
//     });
// });

// function checkIfRightDate($started_year, $started_month, $ended_year, $ended_month){
    
//     let date = new Date();

//     // 入力値を取得、日付に変換
//     $started_date = new Date($started_year, $started_month);
//     $ended_date = new Date($ended_year, $ended_month);

//     // 日付を比較
//     if($started_date > $ended_date){ // 終了日が開始日以前の場合
//         // モーダルを再表示
//         //document.querySelector('#modal-1').classList.add('is-open');

//     }


}
