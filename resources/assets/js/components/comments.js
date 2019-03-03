$(function () {
    if (document.getElementById('comments')) {
        new Vue({
            'el': '#comments',
            data: {
                commentText: ""
            },
            mounted() {
                var commentsRulesBlock = $(this.$refs.commentsRulesBlock);
                var textAreaBlock = $(this.$refs.textAreaBlock);
                commentsRulesBlock.height(textAreaBlock.height()+30)

            },
            methods: {
                showRules() {
                    var showAllRulesLink = $(this.$refs.showAllRulesLink);
                    var commentsRulesBlock = $(this.$refs.commentsRulesBlock);
                    commentsRulesBlock.height('100%')
                    commentsRulesBlock.addClass('show-all')
                    showAllRulesLink.hide()
                },
                async addComment() {
                    const {commentText} = this;
                    const postId = $(this.$el).attr('post-id')
                    try {
                        await this.$http.post(`/api/shop/${postId}/comment`, {
                            content: commentText,
                        });
                        swal({
                            title: "Выполнено успешно",
                            text: "Ваш комментарий добавлен!",
                            type: "success",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Закрыть",
                        }, function () {
                            location.reload();
                        });
                    } catch (e) {
                        swal({
                            title: "Ошибка",
                            text: "Не получилось добавить комментарий!",
                            type: "error",
                            confirmButtonClass: "btn-warning",
                            confirmButtonText: "Закрыть",
                        });
                    }
                },
                clearComment() {
                    this.commentText = ''
                },
            }
        });
    }
});