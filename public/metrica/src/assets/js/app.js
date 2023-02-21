/**
 * Theme: Metrica - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Module/App: Main Js
 */


 feather.replace();
 // Menu sticky
 function windowScroll() {
     var navbar = document.getElementById("navbar-custom");
     if (
         document.body.scrollTop >= 50 ||
         document.documentElement.scrollTop >= 50
     ) {
         navbar?.classList.add("nav-sticky");
     } else {
         navbar?.classList.remove("nav-sticky");
     }
 }
 window.addEventListener('scroll', (ev) => {
     ev.preventDefault();
     windowScroll();
 })
 var triggerTabList = [].slice.call(document.querySelectorAll('#tab-menu a'))
 triggerTabList.forEach(function (triggerEl) {
     var tabTrigger = new bootstrap.Tab(triggerEl)
     triggerEl.addEventListener('click', function (event) {
         event.preventDefault()
         tabTrigger.show()
         document.body.classList.remove('enlarge-menu');
     })
 })
 var collapses = document.querySelectorAll('.navbar-nav .collapse');
 collapses.forEach(collapse => {
     // Init collapses
     var collapseInstance = new bootstrap.Collapse(collapse, {
         toggle: false
     });
     // Hide sibling collapses on `show.bs.collapse`
     collapse.addEventListener('show.bs.collapse', (e) => {
         e.stopPropagation();
         var closestCollapse = collapse.parentElement.closest('.collapse');
         if (closestCollapse != null) {
             var siblingCollapses = closestCollapse.querySelectorAll('.collapse');
             siblingCollapses.forEach(siblingCollapse => {
                 var siblingCollapseInstance = bootstrap.Collapse.getInstance(
                     siblingCollapse);
                 if (siblingCollapseInstance === collapseInstance) {
                     return;
                 }
                 siblingCollapseInstance.hide();
             });
         }
     });
     // Hide nested collapses on `hide.bs.collapse`
     collapse.addEventListener('hide.bs.collapse', (e) => {
         e.stopPropagation();
         var childCollapses = collapse.querySelectorAll('.collapse');
         childCollapses.forEach(childCollapse => {
             var childCollapseInstance = bootstrap.Collapse.getInstance(childCollapse);
             childCollapseInstance.hide();
         });
     });
 })
 //  Toggle sidebar onclick
 try {
     document.getElementById('togglemenu').addEventListener("click", function (event) {
         event.preventDefault();
         document.body.classList.toggle('enlarge-menu')
     });
 } catch (err) {}
 // Left sidebar Tab Menu Responsive Resize 
 if (window.screen.width < 1025) {
     document.getElementsByTagName('body')[0].classList.add('enlarge-menu', 'enlarge-menu-all');
 } else if (window.screen.width < 1340) {
     document.getElementsByTagName('body')[0].classList.remove('enlarge-menu-all');
     document.getElementsByTagName('body')[0].classList.add('enlarge-menu');
 }
 else {
     // document.getElementsByTagName('body')[0].classList.remove('enlarge-menu', 'enlarge-menu-all');
 }
 window.addEventListener('resize', function () {
     if (window.screen.width < 1025) {
         document.getElementsByTagName('body')[0].classList.add('enlarge-menu', 'enlarge-menu-all');
     } else if (window.screen.width < 1340) {
         document.getElementsByTagName('body')[0].classList.remove('enlarge-menu-all');
         document.getElementsByTagName('body')[0].classList.add('enlarge-menu');
     }
     else {
         // document.getElementsByTagName('body')[0].classList.remove('enlarge-menu', 'enlarge-menu-all');
     }
 });
 document.querySelectorAll(".leftbar-tab-menu a").forEach(function (element, index) {
     var pageUrl = window.location.href.split(/[?#]/)[0];
     if (element.href == pageUrl) {
         element.classList.add("active");
         if(!element.parentElement.parentElement.classList.contains('navbar-nav')){
         var collapse1 = element.closest('.collapse');
         if (collapse1) {
             collapse1.classList.add("show");
             var navLink1 = collapse1.parentElement.querySelector('a');
             navLink1.classList.remove('collapsed');
             navLink1.setAttribute("aria-expanded", "true");
             var collapse2 = collapse1.parentElement.closest('.collapse');
             if (collapse2) {
                 collapse2.classList.add("show");
                 var navLink2 = collapse2.parentElement.querySelector('a');
                 navLink2.classList.remove('collapsed');
                 collapse2.parentElement.childNodes[1].setAttribute("aria-expanded", "true");
             }
         }
     }
         var tabPane = element.closest('.tab-pane');
         if (tabPane) {
             tabPane.classList.add('active');
             document.querySelectorAll('a').forEach(function (elementA, index) {
                 if (elementA.href.includes(tabPane.id)) {
                     elementA.classList.add("active");
                 }
             });
         }
     }
 });
 var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
 var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
 return new bootstrap.Tooltip(tooltipTriggerEl)
 });
 var dropdowns = document.querySelectorAll('.dropup, .dropend, .dropdown, .dropstart');
   var events = ['click'];
   function toggleDropdown(e, dropdown) {
     var parentMenu = dropdown.closest('.dropdown-menu');
     if (parentMenu) {
       e.preventDefault();
       e.stopPropagation();
       var currentMenu = dropdown.querySelector('.dropdown-menu');
       var siblingMenus = parentMenu.querySelectorAll('.dropdown-menu');
       [].forEach.call(siblingMenus, function(menu) {
         if (menu !== currentMenu) {
           menu.classList.remove('show');
         }
       });
       currentMenu.classList.add('show');
     }
   }
   function hideDropdowns(dropdown) {
     var currentMenu = dropdown.querySelector('.dropdown-menu');
     var nestedMenus = currentMenu.querySelectorAll('.dropdown-menu');
     if (nestedMenus) {
       [].forEach.call(nestedMenus, function(menu) {
         menu.classList.remove('show');
       });
     }
   }
   [].forEach.call(dropdowns, function(dropdown) {
     var toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
     if (toggle) {
       toggle.addEventListener(events[0], function(e) {
         toggleDropdown(e, dropdown);
       });
     }else{
         hideDropdowns(dropdown);
     }
   });
 //Menu
 // Toggle menu
 function toggleMenu() {
     document.getElementById('mobileToggle').classList.toggle('open');
     var isOpen = document.getElementById('navigation')
     if (isOpen.style.display === "block") {
         isOpen.style.display = "none";
     } else {
         isOpen.style.display = "block";
     }
 };




 function activateMenu() {
    var menuItems = document.getElementsByClassName("sub-menu-item");
    if (menuItems) {
        var matchingMenuItem = null;
        for (var idx = 0; idx < menuItems.length; idx++) {
            if (menuItems[idx].href === window.location.href) {
                matchingMenuItem = menuItems[idx];
            }
        }
        if (matchingMenuItem) {
            matchingMenuItem.classList.add('active');
            var immediateParent = getClosest(matchingMenuItem, 'li');
            if (immediateParent) {
                immediateParent.classList.add('active');
            }
            var parent = getClosest(matchingMenuItem, '.parent-menu-item');
            if (parent) {
                parent.classList.add('active');
                var parentMenuitem = parent.querySelector('.menu-item');
                if (parentMenuitem) {
                    parentMenuitem.classList.add('active');
                }
                var parentOfParent = getClosest(parent, '.parent-parent-menu-item');
                if (parentOfParent) {
                    parentOfParent.classList.add('active');
                }
            } else {
                var parentOfParent = getClosest(matchingMenuItem, '.parent-parent-menu-item');
                if (parentOfParent) {
                    parentOfParent.classList.add('active');
                }
            }
        }
    }
}

document.querySelectorAll('.menu-body a')
.forEach(function (element, index) {
  var pageUrl = window.location.href.split(/[?#]/)[0];
  const target = element;
  if (element.href == pageUrl) {

    target.classList.add('active');
    target.parentNode.classList.add('menuitem-active');
    target.parentNode.querySelector('.nav-link')?.setAttribute('aria-expanded',"true");
    target.parentNode.parentNode.parentNode.classList.add('show');
    target.parentNode.parentNode.parentNode.parentNode.classList.add('menuitem-active'); 
    target.parentNode.parentNode.parentNode.parentNode.querySelector('.nav-link')?.setAttribute('aria-expanded',"true");// add active to li of the current link

    var firstLevelParent = target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
    if (firstLevelParent.getAttribute('id') !== 'sidebar-menu') {
      firstLevelParent.classList.add('show');
    }

    target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('menuitem-active');
    target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('.nav-link')?.setAttribute('aria-expanded',"true");

    var secondLevelParent = target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
    if (secondLevelParent && secondLevelParent instanceof HTMLElement) {
        if(secondLevelParent.getAttribute('id') !== 'wrapper')
            secondLevelParent.classList.add('show');
    }

    var upperLevelParent = target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
    if (upperLevelParent) {
      upperLevelParent = upperLevelParent.parentNode;
    }

    if (upperLevelParent) {
      upperLevelParent.classList.add('menuitem-active');
      //upperLevelParent.querySelector('.nav-link')?.setAttribute('aria-expanded',"true");

    }
  }
});


if (document.querySelectorAll("#navigation").length) {
    document.querySelectorAll('#navigation li a').forEach(function (element, index) {
        var pageUrl = window.location.href.split(/[?#]/)[0];
        if (element.href == pageUrl) {
            const target = element;
            target.classList.add('active');
            var newAtrribute = target.getAttribute('aria-labelledby');
            while(true){
                var temp = document.querySelector('#'+newAtrribute);
                temp?.classList.add('active');
                newAtrribute = temp?.getAttribute('aria-labelledby');
                temp?.setAttribute('aria-expanded','true');
                if(!newAtrribute)
                    break;
            }
            // target.parentNode.classList.add('active');
            target.parentNode.parentNode.classList.add('active'); // add active to li of the current link
            target.parentNode.parentNode.parentElement.querySelector('.nav-link')?.classList.add('active');
            target.parentNode.parentNode.parentNode.parentNode.classList.add('active');
            target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('active');
        }
    });

    // Topbar - main menu
    document.querySelector('.navbar-toggle').addEventListener("click", function (e) {
        e.target.classList.toggle("open");
        //document.getElementById('#navigation').slideToggle(400);
    });
}