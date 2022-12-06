let calulator = {
  operand1: 1,
  operand2: 1,
  add: function () {
    this.result = this.operand1 + this.operand2;
  },
};
calulator.add();
console.log(calulator.result);
