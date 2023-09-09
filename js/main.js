var app = angular.module("my_app", []);
app.controller("my_controller", function ($scope) {
    $scope.datalist = new Array();
    $scope.columns = ['Số phương tiện', 'Chủ phương tiện', 'SDT', 'Nơi DKTT', 'Cập nhật'];
    $scope.today = new Date();
    $scope.update = function () {
        var user = {
            "soPT": this.soPT,
            "chuPT": this.chuPT,
            "SDT": this.SDT,
            "noiDK": this.noiDK
        };
        this.datalist[this.datalist.length] = user;
    }
});
