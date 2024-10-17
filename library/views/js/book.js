function isValid(pForm) {
    const bookTitle = pForm.book_title.value;
    const author = pForm.author.value;
    const yearOfPublication = pForm.year_of_publication.value;

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");
    let e3 = document.getElementById("err3");

    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";

    let flag = true;

    if (bookTitle === "") {
        e1.innerHTML = "Please provide the book title.";
        flag = false;
    }

    if (author === "") {
        e2.innerHTML = "Please provide the author name.";
        flag = false;
    }

    if (yearOfPublication === "" || isNaN(yearOfPublication)) {
        e3.innerHTML = "Please provide a valid year of publication.";
        flag = false;
    }

    return flag;
}
