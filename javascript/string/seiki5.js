var globalTitle = 'Winter Is Cming';

// Add your code below this line
function urlSlug(title) {
    return title.toLowerCase().trim().split(/\s+/).join('-');
}
// Add your code above this line

console.log((winterComing = urlSlug(globalTitle)));
// Only change code above this lineo
