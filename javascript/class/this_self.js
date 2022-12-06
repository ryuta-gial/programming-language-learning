let obj3 = {
    val: "hoge",
    checkThis: function () {
        let self = this;
        console.log(self.val);
        function innerCheckThis() {
            console.log(self.val);
        }
        innerCheckThis();
    },
};

obj3.checkThis();
