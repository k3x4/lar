<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="<?php echo e(asset('assets/admin/theme/vendors/custom/datatables/datatables.bundle.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/theme/vendors/custom/datatables/datatables.bundle.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <?php if (\Entrust::can('listing-create')) : ?>
            <a class="btn btn-success" href="<?php echo e(route('admin.listings.create')); ?>"> New Listing</a>
            <?php endif; // Entrust::can ?>
        </div>
    </div>
</div>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Listings list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="m_datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                            <th style="width: 1%;">ID</th>
                            <th style="width: 20%;">Title</th>
                            <th style="width: 20%;">Slug</th>
                            <th style="width: 50%;">Content</th>
                            <th style="width: 10%;">Created</th>
                        </tr>
                    </thead>
                </table>
                <?php if (\Entrust::can('listing-delete')) : ?>
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.listings.destroy'], 'class' => 'deleteForm']); ?>

                    <?php echo Form::hidden('ids'); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger disabled', 'data-confirm' => 'Are you sure you want to delete?']); ?>

                    <?php echo Form::close(); ?>

                <?php endif; // Entrust::can ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
    <script>
    $('#m_datatable').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    url: 'inc/api/datatables/demos/orders.php',
                    method: 'GET',
                    // custom headers
                    headers: { 'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                    params: {
                        // custom parameters
                        generalSearch: '',
                        EmployeeID: 1,
                        someParam: 'someValue',
                        token: 'token-value'
                    },
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                }
            },
            pageSize: 10,
            saveState: {
                cookie: true,
                webstorage: true
            },

            serverPaging: false,
            serverFiltering: false,
            serverSorting: false,
            autoColumns: false
        },

        layout: {
            theme: 'default',
            class: 'm-datatable--brand',
            scroll: false,
            height: null,
            footer: false,
            header: true,

            smoothScroll: {
                scrollbarShown: true
            },

            spinner: {
                overlayColor: '#000000',
                opacity: 0,
                type: 'loader',
                state: 'brand',
                message: true
            },

            icons: {
                sort: {asc: 'la la-arrow-up', desc: 'la la-arrow-down'},
                pagination: {
                    next: 'la la-angle-right',
                    prev: 'la la-angle-left',
                    first: 'la la-angle-double-left',
                    last: 'la la-angle-double-right',
                    more: 'la la-ellipsis-h'
                },
                rowDetail: {expand: 'fa fa-caret-down', collapse: 'fa fa-caret-right'}
            }
        },

        sortable: false,

        pagination: true,

        search: {
        // enable trigger search by keyup enter
        onEnter: false,
        // input text for search
        input: $('#generalSearch'),
        // search delay in milliseconds
        delay: 400,
        },

        detail: {
            title: 'Load sub table',
            content: function (e) {
                // e.data
                // e.detailCell
            }
        },

        rows: {
        callback: function() {},
        // auto hide columns, if rows overflow. work on non locked columns
        autoHide: false,
        },

        // columns definition
        columns: [{
            field: "RecordID",
            title: "#",
            locked: {left: 'xl'},
            sortable: false,
            width: 40,
            selector: {class: 'm-checkbox--solid m-checkbox--brand'}
        }, {
            field: "OrderID",
            title: "Order ID",
            sortable: 'asc',
            filterable: false,
            width: 150,
            responsive: {visible: 'lg'},
            locked: {left: 'xl'},
            //template: ''
        }, {
            field: "ShipCountry",
            title: "Ship Country",
            width: 150,
            overflow: 'visible',
            template: function (row) {
                return row.ShipCountry + ' - ' + row.ShipCity;
            }
        }, {
            field: "ShipCountry",
            title: "Ship Country",
            width: 150,
            overflow: 'visible',
            sortCallback: function (data, sort, column) {
                var field = column['field'];
                return $(data).sort(function (a, b) {
                    var aField = a[field];
                    var bField = b[field];
                    if (sort === 'asc') {
                        return parseFloat(aField) > parseFloat(bField)
                            ? 1 : parseFloat(aField) < parseFloat(bField)
                                ? -1
                                : 0;
                    } else {
                        return parseFloat(aField) < parseFloat(bField)
                            ? 1 : parseFloat(aField) > parseFloat(bField)
                                ? -1
                                : 0;
                    }
                });
            }
        }],

        toolbar: {
            layout: ['pagination', 'info'],

            placement: ['bottom'],  //'top', 'bottom'

            items: {
                pagination: {
                    type: 'default',

                    pages: {
                        desktop: {
                            layout: 'default',
                            pagesNumber: 6
                        },
                        tablet: {
                            layout: 'default',
                            pagesNumber: 3
                        },
                        mobile: {
                            layout: 'compact'
                        }
                    },

                    navigation: {
                        prev: true,
                        next: true,
                        first: true,
                        last: true
                    },

                    pageSizeSelect: [10, 20, 30, 50, 100]
                },

                info: true
            }
        },

        translate: {
            records: {
                processing: 'Please wait...',
                noRecords: 'No records found'
            },
            toolbar: {
                pagination: {
                    items: {
                        default: {
                            first: 'First',
                            prev: 'Previous',
                            next: 'Next',
                            last: 'Last',
                            more: 'More pages',
                            input: 'Page number',
                            select: 'Select page size'
                        },
                        info: 'Displaying  records'
                    }
                }
            }
        }
    });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>