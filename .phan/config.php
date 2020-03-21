<?php
declare(strict_types=1);

return [
    'target_php_version' => '7.0',
    'directory_list' => [
        'modules', '.phan/stubs'
    ],//, 'admin', 'modules', 'api', 'vendor'],
    'exclude_analysis_directory_list' => [
        'vendor', 'admin', 'api', 'modules', '.phan/stubs'
    ],
    'exclude_file_regex' => '@.*(oven|tests?)\/.+@', // not even sure if its working :)
    'baseline_path' => null,
    'color_issue_messages_if_supported' => true,

    // ---- Temporary Options -----
    'quick_mode' => false,
    'null_casts_as_any_type' => true,
    'minimum_severity' => \Phan\Issue::SEVERITY_NORMAL, //SEVERITY_CRITICAL, SEVERITY_LOW
    // ----------------------------
    // analysis
    'allow_missing_properties' => false,
    'analyze_signature_compatibility' => true,
    'backward_compatibility_checks' => false,
    'check_docblock_signature_param_type_match' => true,
    'check_docblock_signature_return_type_match' => true,
    'enable_extended_internal_return_type_plugins' => true,
    'enable_include_path_checks' => true,
    'enable_internal_return_type_plugins' => true,
    'guess_unknown_parameter_type_using_default' => true,
    'include_paths' => [\Phan\Config::getProjectRootDirectory().'/includes'],
    'infer_default_properties_in_construct' => true,
    'prefer_narrowed_phpdoc_param_type' => true,
    'prefer_narrowed_phpdoc_return_type' => true,
    'allow_method_param_type_widening' => false, // php 7.2+
    'infer_default_properties_in_construct' => true,
    /* 'dead_code_detection' => true, */
    'unused_variable_detection' => true,
    'force_tracking_references' => false, // true
    'redundant_condition_detection' => true,
    'error_prone_truthy_condition_detection' => true,
    'warn_about_redundant_use_namespaced_class' => true,
    'simplify_ast' => false,
    'enable_class_alias_support' => false,
    'consistent_hashing_file_order' => false,
    /* 'minimum_severity' => \Phan\Issue::SEVERITY_LOW, */
    'warn_about_relative_include_statement' => true,
    'analyzed_file_extensions' => ['php'],
    'skip_slow_php_options_warning' => false,
    'autoload_internal_extension_signatures' => [
        'ast'         => '.phan/internal_stubs/ast.phan_php',
        'ctype'       => '.phan/internal_stubs/ctype.phan_php',
        'igbinary'    => '.phan/internal_stubs/igbinary.phan_php',
        'mbstring'    => '.phan/internal_stubs/mbstring.phan_php',
        'pcntl'       => '.phan/internal_stubs/pcntl.phan_php',
        'posix'       => '.phan/internal_stubs/posix.phan_php',
        'readline'    => '.phan/internal_stubs/readline.phan_php',
        'sysvmsg'     => '.phan/internal_stubs/sysvmsg.phan_php',
        'sysvsem'     => '.phan/internal_stubs/sysvsem.phan_php',
        'sysvshm'     => '.phan/internal_stubs/sysvshm.phan_php'
    ],
    'ignore_undeclared_functions_with_known_signatures' => true,
    // not adding syntax check here bcz that exists in git pre commit hook
    'plugin_config' => [
        // 'infer_pure_methods' => true // belongs to UseReturnValue Plugin
    ],
    'plugins' => [
        'AlwaysReturnPlugin',
        'DollarDollarPlugin',
        'UnreachableCodePlugin',
        'DuplicateArrayKeyPlugin',
        'PregRegexCheckerPlugin',
        'PrintfCheckerPlugin',
        // 'UseReturnValuePlugin', // memory intensive
        // 'UnknownElementTypePlugin',
        'WhitespacePlugin',
        'InlineHTMLPlugin',
        // 'NoAssertPlugin',
        'PossiblyStaticMethodPlugin',
        'LoopVariableReusePlugin',
        'RedundantAssignmentPlugin',
        'StrictComparisonPlugin',
        'StrictLiteralComparisonPlugin',
        'NonBoolBranchPlugin',
        'NonBoolInLogicalArithPlugin',
        // 'NotFullyQualifiedUsagePlugin',
        'NumericalComparisonPlugin',
        'DuplicateExpressionPlugin',
        'SuspiciousParamOrderPlugin',
        'AvoidableGetterPlugin'
    ],
    'cache_polyfill_asts' => false,
    
    // issue
    'baseline_path' => '.phan/baseline.php',
    'suppress_issue_types' => [
        // 'PhanPluginPossiblyStaticClosure'
    ]
];
