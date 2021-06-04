$(document).ready(function(){
    $('.nav-sub').on('click', function(){
        let kategori = $(this).html();
        var keyword = kategori;
        $('h2').html(kategori);
        console.log("ok");
        
        $.ajax({
            url: "json.php",
            method: "GET",
            success:function(result){
                    console.log("okk");
                $.each(result, function(i,e){
                    console.log("okkk");
                    generate(e.cover, e.judul, e.sinopsis)
                })
            }
        });
    
    
    
    });
    
    function getKategori(){
    };
    
    
    function generate(img, title, desc){
        var code = `
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="${img}" class="card-img-top" >
                        <div class="card-body">
                            <h5 class="card-title">${title}</h5>
                            <p class="card-text">${desc}</p>
                            <a href="#" class="btn " style="background: #98ded9; color: #fff">Baca Sekarang</a>
                        </div>
                    </div> 
                </div>
        
        `;
        $('#buku').html(code);
    };
    
    
    getKategori();

});