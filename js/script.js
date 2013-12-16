$("textarea").keydown(function(e)){
            var $this, end, start, v;
            if (e.keyCode === 9){
                start = this.selectionStart;
                end = this.selectionEnd;
                $this = $(this);
                v = $this.val();
                
                $this.val(v.substring(0,start) 
                          + "\t"
                          + v.substring(end));
                this.selectionStart = this.selectionEnd = start + 1;
                e.preventDefault();
            }
        });