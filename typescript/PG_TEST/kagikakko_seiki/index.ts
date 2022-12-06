function pgt2(arg: string) {
  let result = '';
  //正規表現〇〇を含む、AND（かつ）、〇〇を含む
  const regex = /^(?=.*「)(?=.*」).*$/i;
  if (regex.test(arg)) {
    result = 'OK';
  } else {
    result = 'NG';
  }
  return result;
}
console.log(pgt2('「今日はいい天気だ」'))
