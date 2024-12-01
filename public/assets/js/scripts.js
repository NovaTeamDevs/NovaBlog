document.querySelectorAll("select[data-choices]").forEach((element) => {
    let config = {};
    if (element.dataset.selecttext !== "") {
        config.itemSelectText = element.dataset.selecttext;
    }
    new Choices(element, config);
});
document.querySelectorAll("input[data-taggable]").forEach((element) => {
    let config = {
        delimiter: ",",
        editItems: true,
        removeItemButton: true,
    };
    if (element.dataset.selecttext !== "") {
        config.addItemText = (value) => {
            return element.dataset.selecttext;
        };
    }
    new Choices(element, config);
});
function deleteItem(ele){
    let url = ele.dataset.url;
    let title = ele.dataset.title;
    let token = ele.dataset.token;

    JSAlert.confirm('آیا از حذف این مورد اطمینان دارید؟', 'حذف ' + title, JSAlert.Icons.Deleted, 'تائید', 'لغو').then(function (result){
        if(result){
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    '_token': token,
                    '_method': 'DELETE'
                },
                success: function (response) {
                    if(response.success === true){
                        JSAlert.alert(response.message , 'پیام', JSAlert.Icons.Success, 'بستن').then(function () {
                            setTimeout(function (){
                                window.location.reload();
                            }, 500);
                        });
                    }else{
                        JSAlert.alert(response.message, 'خطا', JSAlert.Icons.Failed, 'بستن');
                    }
                },
                error: function (error){
                    notifier.show('خطا', 'مشکلی پیش آمده. مجدد سعی کنید', 'danger', '', 4000);
                }
            });
        }
    });
}
