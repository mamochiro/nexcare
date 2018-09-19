<table>
    <thead>
    <tr>
        <th>id</th>
        <th>id ผู้ใช้</th>
        <th>path (link รูปภาพ)</th>
        <th>วันที่อัพโหลด</th>
    </tr>
    </thead>
    <tbody>
    @foreach($images as $image)
        <tr>
            <td>{{ $image->id }}</td>
            <td>{{ $image->image_id }}</td>
            <td>https://www.nexventure2018.com/images/imgs/{{ $image->image }}</td>
            <td>{{ $image->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>