function switchContent(evt,contentId) {
    // 移除 全部的active
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }
    // 所有的tabcontent隱藏
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // 對應ID的內容 呈現flex ，被按到的對象active
    document.getElementById(contentId).style.display = "flex";
    evt.currentTarget.className += " active";
}