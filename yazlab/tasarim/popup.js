function PopupAc(file){
    var width=600;
    var height=700;

    var left = (screen.width/2)-(width/2);
    var top = (screen.height/2)-(height/2);

    window.open(file, "baslik", "width="+width+",height="+height+",top="+top+",left="+left+",scrollbars=yes"); 
}