<?php
    $row = $obj->fetch($conn, 'user', $_SESSION['user'], 'username');
switch ($_SESSION['role']) {
    case 'admin':
        # code...
        if ($row['Status'] == 'active') {
            header("Location:Admin/register.php");
            # code...
            // $_SESSION['empid'] = $row['idE'];
        }
        break;
    case 'Doctor':
        # code...
        if ($row['Status'] == 'active') {
            header('location:doctor/news.php');
        }
        break;
    case 'LabTechnitian':
        # code...
        // $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
        if ($row['Status'] == 'active') {
            header('location:lab technician/news.php');
        }
        break;
    case 'Pharmacist':
        # code...
        if ($row['Status'] == 'active') {
            header('location:pharmacy/news.php');}
        break;
    case 'RecordOfficer':
            # code...
            if ($row['Status'] == 'active') {
                header('location:record officer/news.php');}
            break;
            case 'Cashier':
                # code...
                if ($row['Status'] == 'active') {
                    header('location:cashier/news.php');}
                break;
               
                    case 'Nurse':
                        # code...
                        if ($row['Status'] == 'active') {
                            header('location:nurse/news.php');}
                        break;
                        case 'patient':
                            # code...
                            if ($row['Status'] == 'active') {
                                header('location:patient/news.php');}
                            break;
                       
    default:
        header("location:../public/login.php");
        break;
}
    // echo "<script> console.log(".$result['Fname'].")</script>";
