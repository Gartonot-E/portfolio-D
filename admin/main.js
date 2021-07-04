/**
 * Add CLASS "active" to active-link
 */
document.querySelectorAll('aside li a').forEach( e => {
    e.classList.remove('active');
    if(e.href == window.location.href) e.classList.add('active');
});

/**
 * Confirm from delete photo
 * @param {*} id 
 */
function checkToClick (id) {
    if(confirm("Вы действительно хотите удалить фото?")) {
        window.location.href = 'delete.php?id='+id;
    }
}