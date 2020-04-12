$(function() {
	$('#j_create_tree_modal').modal({
		dismissible: false,
		onOpenStart(modal, trigger) {
		},
		onCloseStart(modal, trigger) {
		},
	});
	$('#j_exec_create_tree').on('click', function() {
		$.ajax({
			url: 'api/createtree',
			type: 'post',
			data: {
				'id':101,
				'value':'test_data!'
			},
			beforeSend: function() {
				$('.j_loading').removeClass('c_hide');
			}
		})
		.done(function(data) {
			$('#tree_list > li:eq(1)')
				.before('<li class="collection-item avatar"><i class="material-icons circle green">insert_chart</i><span class="title">(dummy_title)</span><p>(dummy_comment)<br/>(dummy_created_at)</p><a href="#!" class="secondary-content"><i class="material-icons">grade</i></a></li>');
			$('.j_loading').addClass('c_hide');
			// modalを外部からcloseする
			M.Modal.getInstance($('#j_create_tree_modal')).close();
			// toastメッセージを表示
			M.toast({
				html: 'treeを追加しました。',
				displayLength: 2000,
				classes: 'c_base_toast c_success_msg_toast'
			});
		})
		.fail(function(data) {
			//console.log(data);
			M.Modal.getInstance($('#j_create_tree_modal')).close();
			M.toast({
				html: `treeに失敗しました。<br/>${data.responseJSON.message}`,
				displayLength: 4000,
				classes: 'c_base_toast c_fail_msg_toast'
			});
		})
		.always(function(data) {
		})
	});
});
