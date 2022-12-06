let count = 0;
function cc(card) {
    let regex = /[JQKA]/;
    if (card > 1 && card < 7) {
        count++;
    } else if (card === 10 || String(card).match(regex)) {
        count--;
    }

    if (count > 0) return count + ' Bet';
    return count + ' Hold';
}

console.log(cc(2));
cc(3);
cc(7);
cc('K');
cc('A');
