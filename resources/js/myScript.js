document.addEventListener('DOMContentLoaded', (ev) => {
    setTimeout(() => {
        document.querySelectorAll('.flashMessage').forEach(el => {
            el.style.display = 'none'
        })
    }, 3000)

})
export function getSongs(id){
    let songDetails = document.getElementById(id)
    if(songDetails.className !== 'flex'){
        songDetails.className = 'flex'
    }else
        songDetails.className = 'hidden'
}

