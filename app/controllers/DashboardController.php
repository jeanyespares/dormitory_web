function showDashboard() {
    $tenantCount = TenantModel::count(); // kunin mula sa database
    include('public/index.php'); // load mo yung bagong PHP dashboard
}