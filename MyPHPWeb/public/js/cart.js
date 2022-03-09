let number = 1;

function lessProducts() {
    if (this.number == 1) {
      this.number = 1;
    } else {
      this.number--;
    }
}

function  moreProducts() {
    let input = (document.querySelector("body > app-root > app-bookdetails > div > div > div.Book__info > div.Book__info-Count > div > input"));
    this.number++;
  };

function  onCheckAll(){
    let checkAll =  document.getElementById("checkbox__all-product");
    let checkItems = document.querySelectorAll("#checkbox__product");
    if(checkAll && checkAll.checked){
      checkItems.forEach(item => item.checked = true);
    }else{
      checkItems.forEach(item => item.checked = false);
    }
  }