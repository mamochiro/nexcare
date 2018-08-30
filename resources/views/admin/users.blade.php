<table>
    <thead>
    <tr>
        <th>id</th>
        <th>ชื่อ</th>
        <th>โทรศัพท์</th>
        <th>อีเมลล์</th>
        <th>ชื่อลูก</th>
        <th>วันเกิดของลูก</th>
        <th>ที่อยู่</th>
        <th>จังหวัด</th>
        <th>รหัสไปรษณีร์</th>
        <th>วันที่เข้าร่วมกิจกรรม</th>
        <th>หัวข้อพ่อแม่ที่เลือก</th>
        <th>วันที่ลงทะเบียน</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->mail }}</td>
            <td>{{ $user->child_name }}</td>
            <td>{{ $user->child_date }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->province }}</td>
            <td>{{ $user->post_code }}</td>
            <td>{{ $user->join_date }}</td>
            <td>{{ $user->choice }}</td>
            <td>{{ $user->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>