<h3>Thêm sản phẩm</h3>
<table border="1" width = "50%" class="them_sp">
    <form method="POST" action="model/quanlysp/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Tên Sản phẩm</td>
            <td><input type="text" name="tensanpham" id=""></td>
        </tr>
        <tr>
            <td>Mã Sản Phẩm</td>
            <td><input type="text" name="masp"></td>
        </tr>
        <tr>
            <td>Giá Sản Phẩm</td>
            <td><input type="text" name="giasp"></td>
        </tr>
        <tr>
            <td>Số Lượng</td>
            <td><input type="text" name="soluong"></td>
        </tr>
        <tr>
            <td>Tóm Tắt</td>
            <td><textarea rows="5" name="tomtat"></textarea></td>
        </tr>
        <tr>
            <td>Nội Dung</td>
            <td><textarea rows="5" name="noidung"></textarea></td>
        </tr>
        <tr>
            <td>Hình Ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Tình Trạng</td>
            <td>
                <select name="tinhtrang" id="">
                    <option value="1">Kích Hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td collapse="2">
                <input type="submit" name = "themsanpham" value="Thêm sản phẩm">
            </td>
        </tr>
    </form>   
</table>