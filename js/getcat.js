function getBookId(){
    var aKeyValue = window.location.search.substring(1).split("&");
    var bookId = aKeyValue[0].split("=")[1];
    return bookId;
}

console.debug(bookId);

function showSelectedBook(data){
    var selectedBookId = getBookId();
    let bookCategories, bookPrice;

    for(const key in data.products){
        let bookObj = data.products[key];

        if(bookObj.book_id == selectedBookId){
            bookCategories = bookObj.categories;
            bookPrice = bookObj.price;
        }
        
    }
    
            document.querySelector("#cat").innerHTML = bookCategories;
            document.querySelector("#bookPrice").innerHTML = bookPrice;
}

fetch("data/books.json")
.then(Response=>Response.json())
.then(data=>showSelectedBook(data));