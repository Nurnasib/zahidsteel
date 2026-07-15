@extends('layouts.backend.master')
@section('admin')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <style>


        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
            padding: 24px;
            gap: 20px;
        }

        /* LEFT PANEL */
        .left-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card-box {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.06);
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #111;
        }
        .section-sub {
            font-size: 12px;
            color: #888;
            margin-top: 2px;
        }

        /* Top header row with day/week/month */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .period-btns {
            display: flex;
            gap: 4px;
        }
        .period-btns button {
            border: none;
            background: transparent;
            font-size: 13px;
            padding: 4px 12px;
            border-radius: 20px;
            color: #555;
            cursor: pointer;
        }
        .period-btns button.active {
            background: #4361ee;
            color: #fff;
        }

        /* BAR CHART */
        .chart-area {
            margin-top: 16px;
            position: relative;
            height: 220px;
        }

        /* METRICS */
        .metrics-panel {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .metric-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }
        .metric-label { font-size: 12px; color: #888; }
        .metric-value { font-size: 15px; font-weight: 700; color: #111; }
        .metric-goal-label { font-size: 12px; color: #888; text-align: right; }
        .metric-goal-val { font-size: 13px; font-weight: 600; color: #111; text-align: right; }
        .metric-info { min-width: 80px; }
        .metric-goal { min-width: 60px; }

        .progress-bar-wrap {
            flex: 1;
            background: #eee;
            border-radius: 4px;
            height: 5px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            border-radius: 4px;
        }
        .fill-blue   { background: #4361ee; }
        .fill-purple { background: #9b59b6; }
        .fill-indigo { background: #3d5af1; }
        .fill-red    { background: #e74c3c; }

        /* BOTTOM STATS */
        .bottom-stats {
            display: flex;
            gap: 16px;
        }
        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 16px 20px;
            flex: 1;
            box-shadow: 0 1px 6px rgba(0,0,0,0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .stat-left .stat-label { font-size: 12px; color: #888; }
        .stat-left .stat-val   { font-size: 20px; font-weight: 700; color: #111; margin: 4px 0; }
        .stat-left .badge-green {
            background: #e6f9ef;
            color: #27ae60;
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 20px;
            font-weight: 600;
        }
        .stat-left .stat-sub { font-size: 11px; color: #aaa; margin-top: 4px; }
        .mini-chart {
            width: 90px;
            height: 40px;
        }

        /* RIGHT PANEL */
        .right-panel {
            width: 280px;
            background: #4361ee;
            border-radius: 14px;
            padding: 24px 20px;
            color: #fff;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .rt-label { font-size: 13px; opacity: 0.85; }
        .rt-count { font-size: 36px; font-weight: 800; letter-spacing: -1px; margin-top: 2px; }

        /* Sparkline bar chart (page views per second) */
        .sparkline-wrap {
            display: flex;
            align-items: flex-end;
            gap: 3px;
            height: 60px;
        }
        .spark-bar {
            flex: 1;
            background: rgba(255,255,255,0.45);
            border-radius: 2px 2px 0 0;
            min-height: 6px;
        }
        .spark-bar.bright {
            background: rgba(255,255,255,0.9);
        }

        /* Top Active Pages */
        .pages-list { display: flex; flex-direction: column; gap: 10px; }
        .page-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
        }
        .page-path {
            color: rgba(255,255,255,0.9);
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .page-path .ext-icon {
            opacity: 0.7;
            font-size: 10px;
        }
        .page-num { font-weight: 700; font-size: 13px; }

        .rt-btn {
            display: flex;
            justify-content: flex-end;
            margin-top: auto;
        }
        .rt-btn button {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.3);
            color: #fff;
            border-radius: 8px;
            padding: 8px 14px;
            font-size: 12px;
            cursor: pointer;
            white-space: nowrap;
        }
        .rt-btn button:hover { background: rgba(255,255,255,0.25); }

        /* Ghost stat cards (3rd & 4th) */
        .stat-card.ghost {
            background: linear-gradient(135deg, #fff8f0, #fff0f0);
        }
        .ghost-visual {
            width: 90px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        hr.metric-divider {
            border: none;
            border-top: 1px solid #f0f0f0;
            margin: 0;
        }
    </style>
    <div class="content">
        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
            <!-- leftside content header -->
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                </ul>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">



            <div class="dashboard-wrapper">

                <!-- LEFT PANEL -->
                <div class="left-panel">

                    <!-- Top chart card -->
                    <div class="card-box">
                        <div class="top-header">
                            <div>
                                <div class="section-title">Analytics Overview</div>
                                <div class="section-sub">Track, Analyze, and Optimize Performance</div>
                            </div>
                            <div class="period-btns">
                                <button>Day</button>
                                <button class="active">Week</button>
                                <button>Month</button>
                            </div>
                        </div>

                        <!-- Bar Chart + Metrics side by side -->
                        <div class="row mt-3">

                            <!-- Chart Section -->
                            <div class="col-lg-7 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="analyticsChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Metrics Section -->
                            <div class="col-lg-5">
                                <div class="card shadow-sm">
                                    <div class="card-body">

                                        <!-- Metric Item -->
                                        <div class="mb-4">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <div class="text-muted small">New Users</div>
                                                    <div class="fw-bold fs-5">19.5k</div>
                                                </div>
                                                <div class="text-end">
                                                    <div class="text-muted small">Goal</div>
                                                    <div class="fw-bold">75%</div>
                                                </div>
                                            </div>
                                            <div class="progress mt-2" style="height:6px;">
                                                <div class="progress-bar bg-primary" style="width:75%"></div>
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Metric Item -->
                                        <div class="mb-4">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <div class="text-muted small">Page Views</div>
                                                    <div class="fw-bold fs-5">48k</div>
                                                </div>
                                                <div class="text-end">
                                                    <div class="text-muted small">Goal</div>
                                                    <div class="fw-bold">45%</div>
                                                </div>
                                            </div>
                                            <div class="progress mt-2" style="height:6px;">
                                                <div class="progress-bar bg-purple" style="width:45%"></div>
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Metric Item -->
                                        <div class="mb-4">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <div class="text-muted small">Page Sessions</div>
                                                    <div class="fw-bold fs-5">33.3k</div>
                                                </div>
                                                <div class="text-end">
                                                    <div class="text-muted small">Goal</div>
                                                    <div class="fw-bold">55%</div>
                                                </div>
                                            </div>
                                            <div class="progress mt-2" style="height:6px;">
                                                <div class="progress-bar bg-info" style="width:55%"></div>
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Metric Item -->
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <div class="text-muted small">Bounce Rate</div>
                                                    <div class="fw-bold fs-5">22.45%</div>
                                                </div>
                                                <div class="text-end">
                                                    <div class="text-muted small">Goal</div>
                                                    <div class="fw-bold">35%</div>
                                                </div>
                                            </div>
                                            <div class="progress mt-2" style="height:6px;">
                                                <div class="progress-bar bg-danger" style="width:35%"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Bottom stat cards -->
                    <div class="bottom-stats">

                        <!-- Website Visits -->
                        <div class="stat-card">
                            <div class="stat-left">
                                <div class="stat-label">Website Visits</div>
                                <div class="stat-val">215.2k</div>
                                <span class="badge-green">+10% Increase</span>
                            </div>
                            <svg class="mini-chart" viewBox="0 0 90 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="0,32 15,28 30,22 45,18 60,14 75,10 90,6"
                                          stroke="#4361ee" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <!-- New Registers -->
                        <div class="stat-card">
                            <div class="stat-left">
                                <div class="stat-label">New Registers</div>
                                <div class="stat-val">35.3k</div>
                                <div class="stat-sub">Last 7 days</div>
                            </div>
                            <svg class="mini-chart" viewBox="0 0 90 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="0,30 15,24 30,28 45,18 60,22 75,16 90,20"
                                          stroke="#e88b5a" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <!-- Placeholder ghost card -->
                        <div class="stat-card ghost" style="flex:0.5; justify-content:center;">
                            <div class="ghost-visual">
                                <svg width="80" height="40" viewBox="0 0 80 40">
                                    <ellipse cx="40" cy="28" rx="30" ry="10" fill="#f5d5c0" opacity="0.6"/>
                                    <ellipse cx="40" cy="18" rx="22" ry="16" fill="#f5c5b0" opacity="0.5"/>
                                    <circle cx="40" cy="10" r="10" fill="#f0b090" opacity="0.7"/>
                                </svg>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- RIGHT PANEL -->
                <div class="right-panel">

                    <div>
                        <div class="rt-label">Realtime Active Users</div>
                        <div class="rt-count">4,890</div>
                    </div>

                    <div>
                        <div class="rt-label" style="margin-bottom:10px;">Page views per second</div>
                        <div class="sparkline-wrap">
                            <div class="spark-bar" style="height:40%"></div>
                            <div class="spark-bar" style="height:55%"></div>
                            <div class="spark-bar" style="height:45%"></div>
                            <div class="spark-bar" style="height:60%"></div>
                            <div class="spark-bar" style="height:50%"></div>
                            <div class="spark-bar" style="height:65%"></div>
                            <div class="spark-bar" style="height:55%"></div>
                            <div class="spark-bar bright" style="height:75%"></div>
                            <div class="spark-bar" style="height:60%"></div>
                            <div class="spark-bar bright" style="height:80%"></div>
                            <div class="spark-bar" style="height:70%"></div>
                            <div class="spark-bar bright" style="height:90%"></div>
                            <div class="spark-bar" style="height:75%"></div>
                            <div class="spark-bar bright" style="height:95%"></div>
                            <div class="spark-bar" style="height:80%"></div>
                            <div class="spark-bar bright" style="height:100%"></div>
                            <div class="spark-bar" style="height:85%"></div>
                            <div class="spark-bar bright" style="height:95%"></div>
                            <div class="spark-bar" style="height:90%"></div>
                            <div class="spark-bar bright" style="height:100%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="rt-label" style="font-weight:700; font-size:14px; margin-bottom:12px;">Top Active Pages</div>
                        <div class="pages-list">
                            <div class="page-row">
                                <div class="page-path">/reports/trends-analysis <span class="ext-icon">↗</span></div>
                                <div class="page-num">1520</div>
                            </div>
                            <div class="page-row">
                                <div class="page-path">/monitoring/user-activity <span class="ext-icon">↗</span></div>
                                <div class="page-num">980</div>
                            </div>
                            <div class="page-row">
                                <div class="page-path">/specific/industry-comparisons <span class="ext-icon">↗</span></div>
                                <div class="page-num">856</div>
                            </div>
                            <div class="page-row">
                                <div class="page-path">/global-reach-2023/statistics <span class="ext-icon">↗</span></div>
                                <div class="page-num">735</div>
                            </div>
                            <div class="page-row">
                                <div class="page-path">/security-alerts/2025-update <span class="ext-icon">↗</span></div>
                                <div class="page-num">520</div>
                            </div>
                        </div>
                    </div>

                    <div class="rt-btn">
                        <button>All Real-Time Report &rsaquo;</button>
                    </div>

                </div>

            </div>

            <!-- Tooltip -->



        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // ── Data sets ──────────────────────────────────────────────
        const chartData = {
            day: {
                labels: ['6am','8am','10am','12pm','2pm','4pm','6pm','8pm','10pm'],
                newUsers:      [12, 18, 25, 40, 35, 50, 44, 30, 15],
                pageViews:     [20, 30, 45, 70, 60, 80, 65, 48, 22],
                pageSessions:  [ 8, 14, 20, 35, 28, 42, 38, 24, 10]
            },
            week: {
                labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
                newUsers:      [30, 52, 88, 94, 62, 65, 35],
                pageViews:     [55, 48, 80, 72, 20, 20, 80],
                pageSessions:  [22, 60, 78, 30, 62, 25, 18]
            },
            month: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                newUsers:      [40, 55, 70, 60, 80, 95, 85, 72, 65, 78, 88, 92],
                pageViews:     [50, 65, 75, 68, 90, 85, 78, 65, 70, 82, 76, 95],
                pageSessions:  [30, 45, 55, 48, 65, 70, 62, 54, 58, 66, 72, 80]
            }
        };

        // ── Chart init ─────────────────────────────────────────────
        const ctx = document.getElementById('analyticsChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.week.labels,
                datasets: [
                    {
                        label: 'New Users',
                        data: chartData.week.newUsers,
                        backgroundColor: '#4361ee',
                        borderRadius: 4,
                        barPercentage: 0.75,
                        categoryPercentage: 0.6
                    },
                    {
                        label: 'Page Views',
                        data: chartData.week.pageViews,
                        backgroundColor: '#9b59b6',
                        borderRadius: 4,
                        barPercentage: 0.75,
                        categoryPercentage: 0.6
                    },
                    {
                        label: 'Page Sessions',
                        data: chartData.week.pageSessions,
                        backgroundColor: '#e74c3c',
                        borderRadius: 4,
                        barPercentage: 0.75,
                        categoryPercentage: 0.6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 700,
                    easing: 'easeInOutQuart'
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#111',
                        bodyColor: '#444',
                        borderColor: '#e0e0e0',
                        borderWidth: 1,
                        padding: 10,
                        cornerRadius: 10,
                        callbacks: {
                            title: (items) => items[0].label,
                            label: (item) => ` ${item.dataset.label}: ${item.raw}`
                        },
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: { color: '#aaa', font: { size: 11 } }
                    },
                    y: {
                        min: 0,
                        max: 100,
                        ticks: { stepSize: 20, color: '#aaa', font: { size: 11 } },
                        grid: { color: '#f0f0f0' },
                        border: { display: false }
                    }
                }
            }
        });

        // ── Period switch with animation ───────────────────────────
        function switchPeriod(period) {
            const d = chartData[period];

            // Animate bars down to 0 first, then swap data and animate back up
            chart.data.datasets.forEach(ds => { ds.data = ds.data.map(() => 0); });
            chart.update({ duration: 300, easing: 'easeInQuart' });

            setTimeout(() => {
                chart.data.labels = d.labels;
                chart.data.datasets[0].data = d.newUsers;
                chart.data.datasets[1].data = d.pageViews;
                chart.data.datasets[2].data = d.pageSessions;
                chart.update({ duration: 600, easing: 'easeOutBounce' });
            }, 320);
        }

        document.querySelectorAll('.period-btns button').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.period-btns button').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const map = { 'Day': 'day', 'Week': 'week', 'Month': 'month' };
                switchPeriod(map[btn.textContent.trim()]);
            });
        });
    </script>
@endsection
