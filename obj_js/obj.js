function Image(src, x, y, width, height) {
   
     this.image = document.createElement("img");
    
     this.image.src = src;
    
     this.image.style.position = "absolute";
     this.image.style.left = x+"px";
     this.image.style.top = y+"px";
   
     this.image.width = width;
     this.image.height = height;
   
     document.body.appendChild(this.image);
    }
    
    Image.prototype.show = function() {
     this.image.style.visibility = "visible";
    }
   
    Image.prototype.hide = function() {
     this.image.style.visibility = "hidden";
    }
    
    Image.prototype.putAt = function(x,y) {
     this.image.style.left = x+"px";
     this.image.style.top = y+"px";
    }
   
    Image.prototype.resize = function(width, height) {
     this.image.width = width;
     this.image.height = height;
    }