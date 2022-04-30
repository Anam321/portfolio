<style>
.ukh2 {
    font-size: 16px;
}

* {
    box-sizing: border-box;
}

.columnright {
    float: left;
    width: 23.33%;
    padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}

/* Tata letak responsif - membuat ketiga kolom bertumpuk, bukan bersebelahan */
@media screen and (max-width: 500px) {
    .columnright {
        width: 20%;
    }
}

</style>
<div class="col-lg-4">
    <div class="sidebar shadow p-3 mb-5 bg-body rounded">

        <div class="sidebar-widget">
            <div class="single-related">
                <h2 style="font-size: 18px;">Related Post</h2>
                <div class="owl-carousel related-slider">
                    <?php foreach ($art as $blog) : ?>
                    <div class="post-item">
                        <div class="post-img">
                            <img src="<?= base_url() ?>assets/upload/artikel/<?= $blog->foto ?>" />
                        </div>
                        <div class="post-text">
                            <a
                                href="<?= base_url() ?>artikel/single/<?= $blog->slug ?>/"><?= $blog->judul_artikel ?></a>
                            <div class="post-meta">
                                <p>By<a href=""><?= $blog->penerbit ?></a></p>
                                <p>In<a href=""><?= waktu_lalu($blog->date_post) ?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="sidebar-widget">
            <h2 class="widget-title" style="font-size: 18px;">Produk Baru</h2>
            <div class="recent-post">

                <?php foreach ($produk as $row) : ?>

                <div class="post-item">
                    <div class="post-img">
                        <img src="<?= base_url() ?>assets/upload/gallery/<?= $row->foto ?>" />
                    </div>
                    <div class="post-text">
                        <a
                            href="<?= base_url() ?>produk/detail_produk/<?= $row->slug ?>/<?= $row->produk_id ?>"><?= $row->nama_produk ?></a>
                        <div class="post-meta">
                            <p>Di Lihat<a href="#">3</a></p>
                            <p>Post<a href="#"><?= waktu_lalu($row->date_post) ?></a></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
        </div>

        <div class="sidebar-widget">
            <h2 class="widget-title" style="font-size: 18px;">Gallery Widget</h2>
            <div class="text-widget">

            </div>
            <div class="row">

                <?php foreach ($gallery as $row) : ?>
                <div class="columnright">
                    <div class="post-item">
                        <div class="post-img">
                            <img src="<?= base_url() ?>assets/upload/gallery/<?= $row->foto ?>" />
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
        </div>


    </div>
</div>
