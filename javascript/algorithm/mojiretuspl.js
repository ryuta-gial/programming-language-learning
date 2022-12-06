function spinalCase(str) {
    return str
        .split(/\s|_|(?=[A-Z])/)
        .join('-')
        .toLowerCase();
}

console.log(spinalCase('This Is Spinal Tap'));

function translatePigLatin(str) {
    return str.replace(/^[aeiou]\w*/, '$&way').replace(/(^[^aeiou]+)(\w*)/, '$2$1ay');
}

console.log(translatePigLatin('consonant'));
